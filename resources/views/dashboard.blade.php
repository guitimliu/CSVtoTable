<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> -->
                <form>
                    <input type="submit" value="ok" id="submit">
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // console.log(axios);
    const submitBtn = document.querySelector('#submit');
    // console.log(submitBtn)
    submitBtn.addEventListener('click', (e) => {
        submit();
    })
    function submit() {
        axios.post('http://localhost:8000/api/CSVtoTables', {
            date: '2021-12-14',
            usec: 'user',
            SourceIP: '127.0.0.1',
            SourcePort: 80,
            DestinationIP: '127.0.0.2',
            DestinationPort: 80,
            FQDN: 'localhost',
        })
        .then((res) => {
            console.log(res);
        })
        .catch((err) => {
            console.log((err));
        })
    }
</script>