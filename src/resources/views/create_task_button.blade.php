<button
    class="w-16 h-16 bg-teal-500 rounded-full hover:bg-teal-700 active:shadow-lg mouse shadow transition ease-in duration-200 focus:outline-none absolute bottom-10 right-5 flex justify-center items-center display"
    href="{{ route('tasks.create') }}" onclick="toggleModal()">
    <svg viewBox="0 0 20 20" enable-background="new 0 0 20 20" class="w-7 h-7">
        <path fill="#FFFFFF" d="M16,10c0,0.553-0.048,1-0.601,1H11v4.399C11,15.951,10.553,16,10,16c-0.553,0-1-0.049-1-0.601V11H4.601
                                C4.049,11,4,10.553,4,10c0-0.553,0.049-1,0.601-1H9V4.601C9,4.048,9.447,4,10,4c0.553,0,1,0.048,1,0.601V9h4.399
                                C15.952,9,16,9.447,16,10z" />
    </svg>
</button>


{{-- <div class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-900 opacity-75" />
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <label>Name</label>
                <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
                <label>Url</label>
                <input type="text" class="w-full bg-gray-100 p-2 mt-2 mb-3" />
            </div>
            <div class="bg-gray-200 px-4 py-3 text-right">
                <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2"
                    onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i
                        class="fas fa-plus"></i> Create</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="fixed bg-black bg-opacity-50 z-1 overflow-y-auto top-0 w-full left-0 h-screen hidden" id="modal">
    <div class="bg-white mx-auto mt-10 w-8/12">
        <span class="close" onclick="toggleModal()">&times;</span>
        <p>Some text in the Modal..</p>
    </div>
</div>

<script>
    function toggleModal() {
        document.getElementById('modal').classList.toggle('hidden')
    }
</script>
