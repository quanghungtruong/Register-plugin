<?php
class friso_registration_form {

    private $display_name;
    private $email; 
    private $username;    
    private $password;
    private $address;
    private $city;
    private $phone_number;
    private $status;
    private $born_plan;
    private $baby_birthday;        
            
    function __construct() {
        add_action('wp', array($this, 'friso_registration'));
        add_shortcode('friso_registration_form', array($this, 'friso_shortcode'));
        //add_action('wp_enqueue_scripts', array($this, 'flat_ui_kit'));
    }

    public function registration_form() {
        
        if (is_wp_error($this->validation())) {
            echo '<div style="margin-bottom: 6px;color:red" class="">';
            echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
            echo '</div>';
        }
        ?>
         <form role="form" id="friso_register"  method="post" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <h3 class="title-lg">ĐĂNG KÝ THAM GIA</h3>
            <div class="control-form">
                <label for="">Tên</label>
                <input class="ip" type="text" name="username" required="true" />
                <em class="note">*</em>
            </div>
            <div class="control-form">
                <label for="">Email</label>
                <input class="ip" type="email" name="email" required="true" />
                <em class="note">*</em>
            </div>
            <div class="control-form">
                <label for="">Địa chỉ</label>
                <input class="ip" type="text" name="address" />
            </div>
            <div class="control-form">
                <label for="">Tỉnh/thành phố</label>
                <div class="select-style">
                    <?php
                        $tinh_thanh = array(
                            'TPHCM', 'Hà Nội', 'An Giang', 'Bà Rịa - Vũng Tàu', 'Bắc Giang', 'Bắc Kạn', 'Bạc Liêu', 'Bắc Ninh', 'Bến Tre', 'Bình Định', 'Bình Dương', 'Bình Phước', 'Bình Thuận', 'Cà Mau', 'Cần Thơ', 'Cao Bằng', 'Đà Nẵng', 'Đắk Lắk',
                            'Đắk Nông', 'Điện Biên', 'Đồng Nai', 'Đồng Tháp', 'Gia Lai', 'Hà Giang', 'Hà Nam', 'Hà Tĩnh', 'Hải Dương', 'Hải Phòng', 'Hậu Giang', 'Hòa Bình', 'Hưng Yên', 'Khánh Hòa', 'Kiên Giang', 'Kon Tum', 'Lai Châu', 'Lâm Đồng',
                            'Lạng Sơn', 'Lào Cai', 'Long An', 'Nam Định', 'Nghệ An', 'Ninh Bình', 'Ninh Thuận', 'Phú Thọ', 'Quảng Bình', 'Quảng Nam', 'Quảng Ngãi', 'Quảng Ninh', 'Quảng Trị', 'Sóc Trăng', 'Sơn La', 'Tây Ninh', 'Thái Bình', 'Thái Nguyên',
                            'Thanh Hóa', 'Thừa Thiên Huế', 'Tiền Giang', 'Trà Vinh', 'Tuyên Quang', 'Vĩnh Long', 'Vĩnh Phúc', 'Yên Bái', 'Phú Yên'
                        );
                        ?>
                    <select name="city" required="true">
                        <option value="">Tỉnh/Thành Phố</option>
                        <?php
                        for ($i = 0; $i < count($tinh_thanh); $i++) {
                            echo '<option value="' . $tinh_thanh[$i] . '">' . $tinh_thanh[$i] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <em class="note">*</em>
            </div>
            <div class="control-form">
                <label for="">Số điện thoại</label>
                <input class="ip" type="number" name="phone_number">
                <em class="note">*</em>
            </div>
            <div class="status">
                <div class="row">
                    <div class="col-4 control-form">
                        <label>Tình trạng</label>
                    </div>
                    <div class="col-8 rightCheck">
                        <div class="control-form">
                            <input id="pregnant" class="ip" value="Đang mang thai" type="radio" name="status">
                            <label for="pregnant">
                                <span class="icoCheck"></span>
                                <span>Mẹ đang mang thai</span>
                            </label>
							<div class="get_date">
                                <input class="ip date_time born_plan" type="text" name="born_plan" value="" placeholder="Ngày dự sinh" />
                            </div>
                        </div>
                        <div class="control-form">
                            <input id="raise" value="Đang nuôi con" type="radio" name="status">
                            <label for="raise">
                                <span class="icoCheck"></span>
                                <span>Mẹ đang nuôi con (trên 2 tuổi)</span>
                            </label>
							<div class="get_date ">
                                <input class="ip date_time baby_birthday" type="text" name="baby_birthday" value="" placeholder="Sinh nhật của bé" />
                            </div>
                        </div>
                        <div class="control-form">
                            <input id="both" value="nothing" type="radio" name="status">
                            <label for="both">
                                <span class="icoCheck"></span>
                                <span>Ngoài hai trường hợp trên</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="grp-btn text-right">
                    <button type="submit" name="reg_submit" class="btn"><img src="<?php bloginfo('stylesheet_directory')?>/img/btn_register.png" alt="" onclick="ga('send', 'event', 'campaign_hanhtrinhmevabe', 'click_dang_ky', '');"/></button>                    
               
                </div>

            </div>
        </form>
        
        <?php
       
        
    }
	
    function validation() {
        if (isset($_POST['reg_submit'])) {
           
            if (empty($this->password)) {
                return new WP_Error('field', 'Mật khẩu hoặc tên đăng nhập không được trống');
            }   
			if(is_email($this->email)!=true){
                return new WP_Error('field', 'Email không đúng');
            }
			if (empty($this->email)) {
                return new WP_Error('field', 'Email không được trống');
            }
            if(email_exists($this->email))
            {
                 return new WP_Error('field','Email đã tồn tại');
            }           
            $phone_check=$this->friso_check_exist_phone_number($this->phone_number);
            if($phone_check!=0)
            {
                return new WP_Error('field','Số điện thoại đã tồn tại');
            }
			if (empty($this->phone_number)) {
                return new WP_Error('field', 'Số điên thoại không được trống');
            }
			if(strlen($this->phone_number)>11 || strlen($this->phone_number)<9 || substr($this->phone_number,0,1)!='0'){
                return new WP_Error('field', 'Số điên thoại không đúng');
            }
			
			$date_born=preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/",$this->born_plan);
            $date_baby=preg_match("/^[0-3][0-9]\/[0-1][0-9]\/[0-9]{4}$/",$this->baby_birthday);
            if(!$date_born && !$this->baby_birthday)
            {
                return new WP_Error('field', 'Định dạng ngày không đúng');
            }
            if(!$date_baby && !$this->born_plan)
            {
                return new WP_Error('field', 'Định dạng ngày không đúng');
            }
        }
        
    }
   /*
    * Check duplicate phone number 
    **/
    function friso_check_exist_phone_number($phone)
    {
        global $wpdb;
        if($phone)
        {
            $sql=$wpdb->prepare("select count(*) from wp_usermeta where meta_key='phone_number' and meta_value = '$phone'",null);
            $result=$wpdb->get_var($sql);
            return $result;
        }
       
    }
    function registration() {
        //if validation information doesn't have errors
        if (!is_wp_error($this->validation())) {
            $userdata = array(
                'user_email'=>esc_attr($this->email),
                'user_login' => esc_attr($this->email),                
                'user_pass' => esc_attr($this->password),
                'first_name' => esc_attr($this->username)
            );      
            $more_info=array(
                'address'=>$this->address,
                'city'=>$this->city,
                'phone_number'=>$this->phone_number,
                'status'=>$this->status,
                'survey'=>'update later',
				'born_plan'=>$this->born_plan,
                'baby_birthday'=>$this->baby_birthday
            );
			if(!email_exists($this->email))
			{
				$register_user_id = wp_insert_user($userdata);
			}           
            
            if (!is_wp_error($register_user_id)) {                
                
                foreach ($more_info as $key=>$value)
                {
                    add_user_meta($register_user_id,$key, $value);
                }
                $this->friso_sent_mail($register_user_id);                
                wp_redirect(home_url().'/dang-ky/?message=success');
                exit();
            } 
        }
    }
/*
 * Hàm gởi mail   
 **/    
function friso_sent_mail($user_id)
{
    $ref=$_GET['ref'];
    if(!$ref)
    {
        $ref=0;
    }
    $code=sha1($user_id.time());
    $active_link=  site_url().'/thank/?user_id='.$user_id.'&ref='.$ref.'&code='.$code;
    if($user_id)
    {
        add_user_meta($user_id,'activation_code',$code,true);
    }    
    $mesagge="<html>"
                . "<body>"
                . "<p><b>Tài khoản của bạn là</b></p>"
                . "<p><b>Tên đăng nhập:</b><span style='color:red'> $this->email</span></p>"
                . "<p><b>Mật khẩu:</b><span style='color:red'> $this->password</span></p>"
                . "<p>Hãy kích hoạt tài khoản để tham gia chương trình:</p>"
                . "<a href='".$active_link."'>$active_link</a>"
                . "</body>"
                . "</html>";
     $headers = array('Content-Type: text/html; charset=UTF-8');      
    wp_mail(esc_attr($this->email),'Xác nhận đăng ký thành viên',$mesagge,$headers);
}
// override core function
    function friso_registration() {
        
        if (isset($_POST['reg_submit'])) {
            
            $this->display_name = isset($_POST['username']) ? $_POST['username'] : '';
            $this->email = isset($_POST['email']) ? $_POST['email'] : '';
            $this->password =substr(md5($this->email),0,6);            
            $this->username = isset($_POST['username']) ? $_POST['username'] : '';
            $this->address = isset($_POST['address']) ? $_POST['address'] : '';
            $this->city = isset($_POST['city']) ? $_POST['city'] : '';
            $this->phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
            $this->status = isset($_POST['status']) ? $_POST['status'] : '';
			$this->born_plan = isset($_POST['born_plan']) ? $_POST['born_plan'] : '';
            $this->baby_birthday = isset($_POST['baby_birthday']) ? $_POST['baby_birthday'] : '';
            $this->registration();
        }
    }
     
    function friso_shortcode() {
        ob_start();
        $this->registration_form();
        return ob_get_clean();
    }

}

global $eve_register;
$eve_register = new friso_registration_form();
