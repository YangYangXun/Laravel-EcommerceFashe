# Laravel-Ecomm Fashe

## 網站簡介
利用 Laravel 和 Bootstrap Template 實作一個購物電商網站，其購物主題為服飾

[主頁面( Home Page )](http://yangsirweb.com/EcommerceFashe/home) 
[後台頁面( Admin )](http://yangsirweb.com/EcommerceFashe/admin)


> 管理員（ Admin ）<BR>
> Email: admin@admin.com <BR>
> Password: password <BR>

## 主要功能

* 商品<BR>
⌞商品陳列<BR>
⌞商品種類<BR>
⌞商品價錢排序<BR>
⌞加入購物車<BR>

* 購物車<BR>
⌞購物車商品列表<BR>
⌞移除商品<BR>
⌞商品數量<BR>

* 結帳<BR>
⌞帳單<BR>
⌞Stripe API 模擬信用卡服務<BR>

* 用戶<BR>
⌞註冊<BR>
⌞登入<BR>

* 後台 ( 只有 admin@admin.com 能登入 ) <BR>
⌞訂單管理<BR>
⌞商品管理<BR>
⌞帳戶管理<BR>


## 運用技術

1. PHP
2. Laravel Framework 開發
3. MySQL 管理資料庫
4. Bootstrap 樣板 
5. AJAX 進行數據更新

## 使用說明

Step 1. 點擊右上角 Login 或 Register ，也可使用預設 Admin 帳號(如上網站簡介中所示)。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/home-page.png)

Step 2. 成功登入後如圖所示。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/login.png)



Step 3. 到 Shop 分頁，點擊商品 Add To Cart。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/add-to-cart.png)



Step 4. 點擊後自動跳轉頁面到購物車清單（ Cart ）。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/cart.png)



Step 5. 購物車清單頁面能夠調整商品數量或是移除商品，調整數量後按下 Update Cart 即可刷新金額，確認購買商品後按下 Proceed To Checkout 即可到付款頁面填寫帳單細項。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/update-cart.png)



Step 7. 填寫表單後即可送出訂單，信用卡模擬測試可用下方範例。

* 此支付管道僅模擬測試用，僅能使用測試卡號。卡號來源 [Stripe Testing](https://stripe.com/docs/testing)

| 卡號 | 月/年 CVC | 說明 |
| -------- | -------- | -------- |
| 4242 4242 4242 4242    | 04/24 242     | Visa    |
| 4000 0000 0000 0069    | 04/24 242     | 過期卡測試    |


![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/bill-checkout.png)


Step 8. 可到[後台](http://yangsirweb.com/EcommerceFashe/admin)查看訂單( Order )，只有 Admin 帳戶才可查看。

![](https://raw.githubusercontent.com/YangYangXun/ProjectImage/master/EcommerceFashe/check-order.png)



## Plugin & 擴展套件

* Stripe API 服務 <BR>
* Laravel ShoppingCar Package <BR>
* Laravel Voyager Admin Package <BR>
* [Fashe Template](https://colorlib.com/wp/template/fashe/)


 


