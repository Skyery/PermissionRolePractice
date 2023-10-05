<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- component -->
            <h1 class="text-2xl font-bold my-7">編輯身分</h1>
            <form method="POST" action="{{ route('admin.roles.update', $role) }}">
                @csrf
                @method('PUT')

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
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
    </div>
</x-admin-layout>