<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
                <input type="submit" value="ok" id="submit">

                <div class="filter">
                    <input type="text" placeholder="源 IP" id="SourceIP">
                    <label for="">日期</label>
                    <input type="date" id="date_start"> to
                    <input type="date" id="date_end">
                    <input type="text" placeholder="FQDN" id="FQDN">
                    <input type="submit" value="篩選" id="filterBtn">
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">編號</th>
                            <th scope="col">日期</th>
                            <th scope="col">時間</th>
                            <th scope="col">usec</th>
                            <th scope="col">SourceIP</th>
                            <th scope="col">SourcePort</th>
                            <th scope="col">DestinationIP</th>
                            <th scope="col">DestinationPort</th>
                            <th scope="col">FQDN</th>
                        </tr>
                    </thead>
                    <tbody class="list">
                        <tr>
                            <td>無資料</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // console.log(axios);
    const submitBtn = document.querySelector('#submit');
    const list = document.querySelector('.list');
    const filter = document.querySelector('.filter');
    // console.log(filter);
    filter.addEventListener('click', (e) => {
        if (e.target.getAttribute('id') != 'filterBtn') {
            return;
        }
        console.log(e.target);
    })
    let str = '';
    // console.log(list)
    
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

    axios.get('http://localhost:8000/api/CSVtoTables')
        .then((res) => {
            let data = res.data.data.data;
            console.log(data);
            data.forEach((item) => {
                str += `
                <tr>
                    <th scope="row">${item.id}</th>
                    <td>${item.date}</td>
                    <td>${item.created_at}</td>
                    <td>${item.usec}</td>
                    <td>${item.SourceIP}</td>
                    <td>${item.SourcePort}</td>
                    <td>${item.DestinationIP}</td>
                    <td>${item.DestinationPort}</td>
                    <td>${item.FQDN}</td>
                </tr>
                `;
            });
            list.innerHTML = str;
        })
        .catch((err) => {
            console.log(err);
        })
</script>