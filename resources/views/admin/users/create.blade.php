<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- component -->
            <h1 class="text-2xl font-bold my-7">新增用戶</h1>
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">用戶名稱</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="text" id="name" name="name" placeholder="" autocomplete="off" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="text" id="email" name="email" placeholder="" autocomplete="off" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">密碼</label>
                            <input class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500"
                            type="password" id="password" name="password" placeholder="" autocomplete="off" required>
                        </div>

                        <div class="mb-4 flex flex-col">
                            <p class="block text-gray-700 text-sm font-bold mb-2">身分</p>
                            <div class="flex">
                                @foreach ($roles as $role)
                                    <label class="flex items-center me-5" for="{{ $role->name }}">
                                        <input class="text-primary-600 transition duration-75 rounded shadow-sm focus:border-primary-500 focus:ring-2 focus:ring-primary-500 disabled:opacity-70 border-gray-300"
                                        type="checkbox" id="{{ $role->name }}" name="roles[]" value="{{ $role->name }}">
                                        <span class="ms-3">{{ $role->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex mt-7">
                    <button type="submit" class="px-4 py-[4px] text-white bg-green-600 hover:bg-green-700 focus:outline-none rounded-md me-3">新增</button>
                    <a href="{{ route('admin.users.index') }}" class="px-4 py-[6px] text-white bg-gray-600 hover:bg-gray-700 focus:outline-none rounded-md">取消</a>
                </div>
            </form>
            
        </div>
    </div>
</x-admin-layout>