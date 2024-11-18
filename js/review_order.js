// gọi dữ liệu từ server
class Review_Order extends BasicHome{
    xhr=new XHR()
    data_order
    async initialize() {
        await this.getDaTA()
        this.RenderTable()
    }
    constructor(){
        super()
        this.initialize()
    }
    getDaTA() {
        return this.xhr.connect("GET","./backend/controllers/donhang.php?getdon&mataikhoan="+this.Account['SDT'])
        .then((data) =>{
            this.data_order=JSON.parse(data);
        })
    }
    RenderTable() {
        var string="";
        const map_status=["Chưa thanh toán","Đã thanh toán","Đã duyệt","Đã giao"]
        $(".profile-username").html(this.Account['name'])
        this.data_order.forEach((item,index) => {
            string+=`<tr>
                        <th scope="row">${index}</th>
                        <td>DH-${item.MaDonHang}</td>
                        <td>${item.NgayDatHang}</td>
                        <td>${item.TongGiaTriDonHang}</td>
                        <td style="color: blue">${map_status[item["TrangThaiDonHang"]]}</td>
                        <td>
                            <a onclick="showchitiethoadon(1)" class="donhang-detail">
                                <i class="fa-solid fa-eye " aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>`
        });
        $(".js_data_order").html(string)
    }
}

const review_order=new Review_Order();
console.log("cmmm")