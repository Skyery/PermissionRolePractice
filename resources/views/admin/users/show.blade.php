<x-admin-layout>
    <div class="py-12 w-full">
        <!-- Edit user -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <header class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold">編輯使用者</h1>
            </header>

            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md mt-7">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">使用者帳號</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Email</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $user->name }}</td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5"><div class="border-t dark:border-gray-700"></div></div>

        <!-- User roles -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <header class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold">身分分配</h1>
            </header>
            <div class="flex mt-7 mb-3">
                @if ($user->roles)
                    @foreach ($user->roles as $user_role)
                    <form method="POST" action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" onsubmit="return confirm('確認撤銷身分?')" class="me-3">
                        @csrf
                        @method('DELETE')

                        <button type="submit">
                            <div class="inline-block relative py-1 text-xs">
                                <div class="absolute inset-0 text-red-200 flex">
                                    <svg height="100%" viewBox="0 0 50 100">
                                        <path
                                            d="M49.9,0a17.1,17.1,0,0,0-12,5L5,37.9A17,17,0,0,0,5,62L37.9,94.9a17.1,17.1,0,0,0,12,5ZM25.4,59.4a9.5,9.5,0,1,1,9.5-9.5A9.5,9.5,0,0,1,25.4,59.4Z"
                                            fill="currentColor" />
                                    </svg>
                                    <div class="flex-grow h-full -ml-px bg-red-200 rounded-md rounded-l-none"></div>
                                </div>
                                <span class="relative text-red-500 uppercase font-semibold pr-px">
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $user_role->name }}<span>&nbsp;</span>
                                </span>
                            </div>
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>

            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                @csrf

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="role">身分</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="role" id="role" autocomplete="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex mt-7">
                    <button type="submit" class="px-4 py-[4px] text-white bg-green-600 hover:bg-green-700 focus:outline-none rounded-md me-3">分配</button>
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-[6px] text-white bg-gray-600 hover:bg-gray-700 focus:outline-none rounded-md">取消</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>