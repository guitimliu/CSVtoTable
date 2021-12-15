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
                <div class="uploadFile">
                    <input type="file" name="CSVfile" id="CSVfile">
                    <input type="submit" value="CSV 轉 Table" id="submit">
                </div>

                <div class="filter">
                    <input type="text" placeholder="源 IP" id="SourceIP">
                    <label for="">日期</label>
                    <input type="datetime-local" id="date_start"> to
                    <input type="datetime-local" id="date_end">
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
                <div class="pageList"></div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // console.log(axios);
    // const submitBtn = document.querySelector('#submit');
    const list = document.querySelector('.list');
    const filter = document.querySelector('.filter');
    let data;
    // console.log(filter);
    filter.addEventListener('click', (e) => {

        if (e.target.getAttribute('id') != 'filterBtn') {
            return;
        }

        let str = '';
        const SourceIP = document.querySelector('#SourceIP');
        const date_start = document.querySelector('#date_start');
        const date_end = document.querySelector('#date_end');
        const FQDN = document.querySelector('#FQDN');

        let filterData = data.filter((item) => {
            let start_if = new Date(date_start.value).getTime() <= new Date(item.created_at).getTime();
            let end_if = new Date(date_end.value).getTime() >= new Date(item.created_at).getTime();

            return item.SourceIP===SourceIP.value && item.FQDN === FQDN.value && start_if && end_if;
        }).forEach((item) => {
            // console.log(new Date(item.created_at).getTime());
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
        })        
        list.innerHTML = str;
        // console.log(str);

        // console.log(, );
        
        // console.log(new Date("2012/12/25 20:11:11").getTime());
    })
    let str = '';
    // console.log(list)
    
    const uploadFile = document.querySelector('.uploadFile');
    uploadFile.addEventListener('click', (e) => {
        submit();
        // const CSVfile = document.querySelector('#CSVfile');
        
        if (e.target.getAttribute('id') !== 'submit') {
            return;
        }
        console.log(e.target.getAttribute('id'));
        // console.log(CSVfile);
    })
    function submit() {
        axios.post('./api/CSVtoTables', {
            date: '2021-12-15',
            usec: 'user',
            SourceIP: '127.0.0.5',
            SourcePort: 80,
            DestinationIP: '127.0.0.6',
            DestinationPort: 80,
            FQDN: 'localhost',
        })
        .then((res) => {
            // console.log(res);
            showData(1, true);
        })
        .catch((err) => {
            // console.log((err));
        })
    }

    showData();
    function showData(page = 1, ifChangePage = false) {
        axios.get(`./api/CSVtoTables?page=${page}`)
        .then((res) => {
            data = res.data.data.data;
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
            str = '';

            if (ifChangePage) {
                return;
            }
            
            let lastPage = res.data.data.last_page;
            const pageList = document.querySelector('.pageList');
            // console.log(pageList);
            str = '頁數：';
            for (let i=1; i<=lastPage; i++) {
                str += `<a href="javascript:void(0)" onClick="showData(${i}, ${true});">${i}</a>`;
            }
            pageList.innerHTML = str;
            str = '';
        })
        .catch((err) => {
            console.log(err);
        })
    }
    
</script>