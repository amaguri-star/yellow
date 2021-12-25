<button
    class="w-16 h-16 bg-teal-500 rounded-full hover:bg-teal-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none absolute bottom-10 right-5 flex justify-center items-center display"
    href="{{ route('tasks.create') }}" onclick="toggleModal()">
    <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-7 h-7">
        <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                C15.952,9,16,9.447,16,10z" />
    </svg>
</button>

<div class="fixed bg-black bg-opacity-50 z-1 overflow-y-auto top-0 w-full left-0 h-screen hidden" id="modal">
    <div class="bg-white mx-auto mt-10 p-6 rounded w-3/6 t">
        <header>
            <p class="text-lg font-medium">Add "done task"</p>
        </header>
        <hr class="my-6">
        <section>
            <div class="w-4/5 mx-auto flex flex-col space-y-4">
                <input class="w-full outline outline-1 outline-gray-300 rounded px-2 py-1" type="text" name="title" placeholder="title">
                <textarea class="w-full outline outline-1 outline-gray-300 rounded px-2 py-1" name="description" id=""
                placeholder="Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse quos laboriosam illo ex soluta ipsa deleniti, suscipit a praesentium, repellendus culpa aliquid odit non delectus architecto distinctio inventore deserunt cum."></textarea>
            </div>
        </section>
        <hr class="my-5">
        <footer class="flex justify-center space-x-4">
            <div  class="border border-red-400 text-red-400 rounded">
                <button class="w-20 h-9 text-center" onclick="toggleModal()">Cancel</button>
            </div>
            <div class="border border-teal-400 text-teal-400 rounded">
                <button class="w-20 h-9 text-center" >Add</button>
            </div>
        </footer>
    </div>
</div>

<script>
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden')
    }
</script>
