<?php
class Query_Functions extends sqlConnection
{


	//------------------Admin Login--------------------
	public function AdminLogin($data)
	{

		$user = $this->getRequest($data['user']);
		$password = $this->getRequest($data['password']);
		$sql_adminlog = $this->query("select id, username from admins where username='" . $user . "' AND password = '" . md5($password) . "' AND isactive=1 limit 0,1");
		return $sql_adminlog->rows;
	}

	//------------------Admin Current Password--------------------
	public function CurrentPassword($cpass)
	{
		$cpassword = $this->getRequest($cpass);
		$sql_passs = $this->query("select id from admins where id=1 AND password='" . md5($cpassword) . "' limit 0,1");

		return $sql_passs->num_rows;
	}

	//----------------Admin Password Edit-------------------
	public function AdminPasswordEdit($data)
	{
		$npass = $this->getRequest($data["npass"]);
		$this->query("Update admins set password='" . md5($npass) . "' where id=1");
	}

	//------------------Contact Submit--------------------
	public function ConatctSubmit($data)
	{
		$this->query("Insert into contacts set fullname='" . input_fields($data['fullname']) . "', email='" . input_fields($data['email']) . "', phone='" . input_fields($data['phone']) . "', country='" . input_fields($data['country']) . "', company_name='" . input_fields($data['company_name']) . "', contact_message='" . input_fields($data['contact_message']) . "', attached_file='" . input_fields($data['attached_file']) . "', created_at='" . date('Y-m-d H:i:s') . "'");
	}

	//------------------Careers Submit--------------------
	public function CareersSubmit($data)
	{
		$this->query("Insert into careers set name='" . input_fields($data['name']) . "', surname='" . input_fields($data['surname']) . "', city='" . input_fields($data['city']) . "', country='" . input_fields($data['country']) . "', address='" . input_fields($data['address']) . "', zipcode='" . input_fields($data['zipcode']) . "', phone='" . input_fields($data['phone']) . "', email='" . input_fields($data['email']) . "', tob_title='" . input_fields($data['tob_title']) . "', about_us='" . input_fields($data['about_us']) . "', attached_file='" . input_fields($data['attached_file']) . "', created_at='" . date('Y-m-d H:i:s') . "'");
	}

	//------------------Excute Product Shopping Listing--------------------
	public function QueryExecuteList($sql_execute)
	{
		$rs_productlist = $this->query($sql_execute);
		return $rs_productlist->rows;
	}

	//------------------Excute Num Rows--------------------
	public function numRows($rowquery)
	{
		$sql_rows = $this->query($rowquery);
		return $sql_rows->num_rows;
	}

	//------------------get Records--------------------
	public function getRecords($tablname, $id)
	{
		$sql_data = $this->query("select * from " . $tablname . " where id='" . $id . "' limit 0,1");
		return $sql_data->rows;
	}

	//------------------view blog Records--------------------
	public function viewBlog($slug)
	{
		$sql_data = $this->query("select * from blogs where slug='" . $slug . "' limit 0,1");
		return $sql_data->rows;
	}

	//------------------Delete Records--------------------
	public function DeleteRecords($tablname, $id)
	{
		$this->query("Delete from " . $tablname . " where id='" . $id . "'");
		return 1;
	}

	//------------------Contact Listed--------------------
	public function ContactList()
	{
		$sql_data = $this->query("select * from contacts order by id desc");
		return $sql_data->rows;
	}

	//------------------Careers Listed--------------------
	public function CareersList()
	{
		$sql_data = $this->query("select * from careers order by id desc");
		return $sql_data->rows;
	}

	//------------------Media Event Type Listed--------------------
	public function MediaEventList()
	{
		$sql_data = $this->query("select * from media_types order by id desc");
		return $sql_data->rows;
	}

	//------------------Media Event Type Listed--------------------
	public function MediaEventTopList($type)
	{
		$sql_data = $this->query("select * from media_types where types='" . $type . "' order by id asc");
		return $sql_data->rows;
	}

	//------------------Media Gallery Listed--------------------
	public function Media_GalleryList($gallorder = '')
	{
		if ($gallorder == 1) {
			$sorting = 'galry.photo_sorting';
		} else {
			$sorting = 'galry.id desc';
		}
		$sql_data = $this->query("select galry.*,media_types.type_name from galleries as galry INNER JOIN media_types ON media_types.id=galry.media_type_id order by " . $sorting);
		return $sql_data->rows;
	}

	//------------------Media Video Listed--------------------
	public function Media_VideoList($videoorder = '')
	{
		if ($videoorder == 1) {
			$sorting = 'vdo.video_sorting';
		} else {
			$sorting = 'vdo.id desc';
		}
		$sql_data = $this->query("select vdo.*,media_types.type_name from videos as vdo INNER JOIN media_types ON media_types.id=vdo.media_type_id order by " . $sorting);
		return $sql_data->rows;
	}

	//------------------Blogs Listed--------------------
	public function BlogsList($itemlimit = '')
	{
		if (!empty($itemlimit)) {
			$limit = ' limit 0,' . $itemlimit;
		} else {
			$limit = '';
		}

		$sql_data = $this->query("select * from blogs order by blog_date desc " . $limit);
		return $sql_data->rows;
	}

	//------------------Banners Listed--------------------
	public function BannersList($sorting)
	{
		$sql_data = $this->query("select * from banners order by id " . $sorting);
		return $sql_data->rows;
	}

	//------------------Contry Dropdown--------------------
	public function getCountryDropdown()
	{
		$valList = '<option selected value="">--</option>';
		$sql_country = $this->query("select name from country where 1");
		if ($sql_country->num_rows > 0) {
			foreach ($sql_country->rows as $DataValue) {
				$valList .= '<option value="' . $DataValue['name'] . '">' . stripslashes($DataValue['name']) . '</option>';
			}
		}
		return $valList;
	}

	//------------------Media Type Dropdown--------------------
	public function getMediaTypeDropdown($mdeia, $selected = '')
	{
		$valList = '<option value="">Select Type</option>';
		$sql_country = $this->query("select id, type_name from media_types where types='$mdeia'");
		if ($sql_country->num_rows > 0) {
			foreach ($sql_country->rows as $DataValue) {
				$valList .= '<option value="' . $DataValue['id'] . '"' . (($DataValue['id'] == $selected) ? 'selected="selected"' : '') . '>' . stripslashes($DataValue['type_name']) . '</option>';
			}
		}
		return $valList;
	}

	//------------------Media Gallery Submit--------------------
	public function Media_GallerySubmitUpdate($data)
	{
		if (isset($data['id']) && !empty($data['id'])) {
			if (isset($data['attached_file'])) {
				$atchdata = ", attached_file='" . input_fields($data['attached_file']) . "'";
			} else {
				$atchdata = '';
			}
			$this->query("Update galleries set media_type_id='" . input_fields($data['media_type_id']) . "', photo_title='" . input_fields($data['photo_title']) . "' " . $atchdata . ", photo_sorting='" . input_fields($data['photo_sorting']) . "' where id='" . $data['id'] . "'");
		} else {
			$this->query("Insert into galleries set media_type_id='" . input_fields($data['media_type_id']) . "', photo_title='" . input_fields($data['photo_title']) . "', attached_file='" . input_fields($data['attached_file']) . "', photo_sorting='" . input_fields($data['photo_sorting']) . "', created_at='" . date('Y-m-d H:i:s') . "'");
		}
	}

	//------------------Media Video Submit--------------------
	public function Media_VideoSubmitUpdate($data)
	{
		if (isset($data['id']) && !empty($data['id'])) {
			$this->query("Update videos set media_type_id='" . input_fields($data['media_type_id']) . "', video_title='" . input_fields($data['video_title']) . "', video_url='" . input_fields($data['video_url']) . "', video_sorting='" . input_fields($data['video_sorting']) . "' where id='" . $data['id'] . "'");
		} else {
			$this->query("Insert into videos set media_type_id='" . input_fields($data['media_type_id']) . "', video_title='" . input_fields($data['video_title']) . "', video_url='" . input_fields($data['video_url']) . "', video_sorting='" . input_fields($data['video_sorting']) . "', created_at='" . date('Y-m-d H:i:s') . "'");
		}
	}

	//------------------Media Event type Submit/Update--------------------
	public function Media_EventTypeSubmitUpdate($data)
	{
		if (isset($data['id']) && !empty($data['id'])) {
			$this->query("Update media_types set types='" . input_fields($data['types']) . "', type_name='" . input_fields($data['type_name']) . "' where id='" . $data['id'] . "'");
		} else {
			$this->query("Insert into media_types set types='" . input_fields($data['types']) . "', type_name='" . input_fields($data['type_name']) . "'");
		}
	}

	//------------------Blog Submit/Update--------------------
	public function BlogSubmitUpdate($data)
	{
		if (isset($data['id']) && !empty($data['id'])) {
			if (isset($data['attached_file'])) {
				$atchdata = ", attached_file='" . input_fields($data['attached_file']) . "'";
			} else {
				$atchdata = '';
			}
			$this->query("Update blogs set title='" . input_fields($data['title']) . "', slug='" . $data['slug'] . "' " . $atchdata . ", external_url='" . input_fields($data['external_url']) . "', blog_description='" . $this->getRequest($data['blog_description']) . "', blog_date='" . input_fields($data['blog_date']) . "' where id='" . $data['id'] . "'");
		} else {
			$this->query("Insert into blogs set title='" . input_fields($data['title']) . "', slug='" . $data['slug'] . "', attached_file='" . input_fields($data['attached_file']) . "', external_url='" . input_fields($data['external_url']) . "', blog_description='" . $this->getRequest($data['blog_description']) . "', blog_date='" . input_fields($data['blog_date']) . "', created_at='" . date('Y-m-d H:i:s') . "'");
		}
	}

	//------------------get gallery sorting no.--------------------
	public function getGallerySorting($eventtype)
	{
		$sql_data = $this->query("select photo_sorting from galleries where media_type_id='$eventtype' order by id desc limit 0,1");
		if ($sql_data->num_rows > 0) {
			$data = $sql_data->rows;
			return $data[0]['photo_sorting'] + 1;
		} else {
			return 0;
		}
	}

	//------------------get Video sorting no.--------------------
	public function getVideoSorting($eventtype)
	{
		$sql_data = $this->query("select video_sorting from videos where media_type_id='$eventtype' order by id desc limit 0,1");
		if ($sql_data->num_rows > 0) {
			$data = $sql_data->rows;
			return $data[0]['video_sorting'] + 1;
		} else {
			return 0;
		}
	}

	//------------------Banner Submit/Update--------------------
	public function BannerSubmitUpdate($data)
	{
		if (isset($data['id']) && !empty($data['id'])) {
			if (isset($data['attached_file'])) {
				$atchdata = ", attached_file='" . input_fields($data['attached_file']) . "'";
			} else {
				$atchdata = '';
			}
			$this->query("Update banners set banner_type='" . input_fields($data['banner_type']) . "' " . $atchdata . ", banner_title='" . input_fields($data['banner_title']) . "' where id='" . $data['id'] . "'");
		} else {
			$this->query("Insert into banners set banner_type='" . input_fields($data['banner_type']) . "', attached_file='" . input_fields($data['attached_file']) . "', banner_title='" . input_fields($data['banner_title']) . "', created_at='" . date('Y-m-d H:i:s') . "'");
		}
	}
}
