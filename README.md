# CSV 轉 Table 工具

使用 PHP 框架 Laravel 打造 RESTful API 搭配 JavaScript + Axios 顯示資料與串接 API 進行實作，並使用 Jetstream 套件搭建會員系統

## 操作流程

### 會員註冊與登入

進入首頁後，至右上角按下 Register 註冊

![image-20211215083915214](C:\Users\Gui\AppData\Roaming\Typora\typora-user-images\image-20211215083915214.png)

填寫 Name、E-mail 以及密碼

![image-20211215084102623](C:\Users\Gui\AppData\Roaming\Typora\typora-user-images\image-20211215084102623.png)

登入後進入 dashboard，如果有資料會呈現以下狀態

![image-20211215084202201](C:\Users\Gui\AppData\Roaming\Typora\typora-user-images\image-20211215084202201.png)

### 篩選

使用篩選功能，可以篩選出符合條件的資訊

![image-20211215084254432](C:\Users\Gui\AppData\Roaming\Typora\typora-user-images\image-20211215084254432.png)

### 分頁

由於目前本機測試資料設定 6 筆，所以此 Demo 我先設定成一頁僅顯示 2 筆（Demo 完後即改回 50 筆），即可透過分頁去顯示下 50 筆資料

但這邊目前有個 Bug，篩選後的分頁數目前是不會變動的，這部分時間關係，目前就沒有進行修正；之後有機會再來進行修正

![image-20211215084509862](C:\Users\Gui\AppData\Roaming\Typora\typora-user-images\image-20211215084509862.png)

### 新增資料至資料表

很遺憾本系統最核心的 CSV 轉 Table 並沒有能夠在時間內實作出來，目前新增測試資料都是透過檔案 **recource/views/dashboard.build.php** 利用綁按鈕監聽事件後執行 function submit() ，並透過 Axios 將設定資料 POST 至 RESTful API（本來這部分要搭配 CSV 資料解析，不過沒成功實作出來）

![image-20211215085121945](C:\Users\Gui\AppData\Roaming\Typora\typora-user-images\image-20211215085121945.png)
