<?php
	class Fungsi
	{
		public static function pengaturan($var)
		{
			$data = \App\Pengaturan::find(1);
			return $data->$var;
		}

		public static function findStatusIzin($url)
		{
			$data = strpos($url, "keluar");
			if ($data !== false) {
				return 1;
			}else{
				return 0;
			}
		}

		public static function get_halaman()
		{
			$data = \App\Halaman::all();
			foreach ($data as $var) {
				echo '<li id="tentang"><a href="'.url('/detailhalaman/'.$var->id.'').'">'.$var->judul.'</a></li>';
			}
		}

		public static function get_perizinan()
		{
			$data = \App\MasterPerizinan::all();
			foreach ($data as $var) {
				echo '<li><a href="'.url('/detailizin/'.$var->id.'').'">'.$var->perizinan.'</a></li>';
			}
		}

		public static function get_link()
		{
			$data = \App\Link::all();
			foreach ($data as $var) {
				echo '<li><a href="'.$var->url.'">'.$var->nama_web.'</a></li>';
			}
		}
	}
 ?>