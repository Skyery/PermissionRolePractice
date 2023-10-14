<x-admin-layout>
    <div class="py-12 w-full">
        <!-- Edit role -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <header class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold">編輯身分</h1>
                <form method="POST" action="{{ route('admin.roles.destroy', $role->id) }}" x-data="{ tooltip: 'Delete' }" onsubmit="return confirm('確認刪除該身分?');" class="px-4 py-[6px] text-white bg-red-600 hover:bg-red-700 focus:outline-none rounded-md">
                    @csrf
                    @method("DELETE")

                    <button type="submit">刪除</button>
                </form>
            </header>

            <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                @csrf
                @method('PUT')

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-7">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">身分</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="text" id="name" name="name" placeholder="" value="{{ $role->name }}" required>
                        </div>
                    </div>
                </div>

                <div class="flex mt-7">
                    <button type="submit" class="px-4 py-[4px] text-white bg-green-600 hover:bg-green-700 focus:outline-none rounded-md me-3">更新</button>
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-[6px] text-white bg-gray-600 hover:bg-gray-700 focus:outline-none rounded-md">取消</a>
                </div>
            </form>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5"><div class="border-t dark:border-gray-700"></div></div>

        <!-- Role permission -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <header class="flex justify-between items-center py-4">
                <h1 class="text-2xl font-bold">權限分配</h1>
            </header>
            <div class="flex mt-7 mb-3">
                @if ($role->permissions)
                    @foreach ($role->permissions as $role_permission)
                    <form method="POST" action="{{ route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}" onsubmit="return confirm('確認撤銷權限?')" class="me-3">
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
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>{{ $role_permission->name }}<span>&nbsp;</span>
                                </span>
                            </div>
                        </button>
                    </form>
                    @endforeach
                @endif
            </div>

            <form method="POST" action="{{ route('admin.roles.permissions', $role->id) }}">
                @csrf

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="permission">身分</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="permission" id="permission" autocomplete="permission">
                            @foreach ($permissions as $permission)
                                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="flex mt-7">
                    <button type="submit" class="px-4 py-[4px] text-white bg-green-600 hover:bg-green-700 focus:outline-none rounded-md me-3">分配</button>
                    <a href="{{ route('admin.roles.index') }}" class="px-4 py-[6px] text-white bg-gray-600 hover:bg-gray-700 focus:outline-none rounded-md">取消</a>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>