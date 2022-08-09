<?php

Route::get('/', 'MasterController@index');

// Route::get('/index', 'MasterController@index');

Auth::routes();

// frontend
Route::get('/pendahuluan', 'MasterController@pendahuluan');
Route::get('/profil', 'MasterController@profil');
Route::get('/vismis', 'MasterController@vismis');
Route::get('/struktur', 'MasterController@struktur');
Route::get('/infoizin', 'MasterController@infoizin');
Route::post('/infoizin', 'MasterController@postinfoizin');
Route::get('/imb', 'MasterController@imb');
Route::get('/reklame', 'MasterController@reklame');
Route::get('/izingangguan', 'MasterController@izingangguan');
Route::get('/situsiup', 'MasterController@situsiup');
Route::get('/izinkes', 'MasterController@izinkes');
Route::get('/pengaduan', 'MasterController@pengaduan');
Route::get('/berita', 'MasterController@berita');
Route::get('/detailberita/{id}', 'MasterController@detailberita');
Route::get('/detailhalaman/{id}', 'MasterController@detailhalaman');
Route::get('/detailizin/{id}', 'MasterController@detailizin');
Route::get('/galeri', 'MasterController@galeri');
Route::get('/simulasi', 'SimulasiController@simulasi');
Route::get('/kontak', 'MasterController@kontak');
Route::get('/coba/{id}', 'MasterController@coba');
Route::get('/cuks/{id}','MasterController@ambilagenda');
Route::post('/pengaduan', 'MasterController@postpengaduan');
Route::post('/infoizin', 'MasterController@postinfoizin');
Route::get('/inputberita', 'MasterController@inputberita');


// backend
Route::group(['prefix' => 'tentemak'], function () {
	Route::get('/','TentemakController@index');
    Route::get('/keluar','TentemakController@keluar');

    //berita
    Route::get('/inputberita','TentemakController@inputberita');
    Route::get('/tambahberita','TentemakController@tambahberita');
    Route::get('/deleteberita/{id}', 'TentemakController@deleteberita');
    Route::get('/editberita/{id}','TentemakController@editberita');
    Route::get('/viewberita/{id}', 'TentemakController@viewberita');

    Route::post('/inputberita', 'TentemakController@postberita');
    Route::post('/updateberita/{id}', 'TentemakController@updateberita');

    //agenda
    Route::get('/tambahagenda','TentemakController@tambahagenda');
    Route::get('/deleteagenda/{id}', 'TentemakController@deleteagenda');
    Route::get('/editagenda/{id}', 'TentemakController@editagenda');
    Route::get('/viewagenda/{id}', 'TentemakController@viewagenda');
    Route::get('/inputagenda','TentemakController@inputagenda');
    Route::post('/inputagenda', 'TentemakController@postagenda');
    Route::post('/updateagenda/{id}', 'TentemakController@updateagenda');

    //perizinan
    Route::get('/inputperizinan','TentemakController@inputperizinan');
    Route::get('/tambahperizinan','TentemakController@tambahperizinan');
    Route::get('/tambahperizinanbulk','TentemakController@tambahperizinanbulk');
    Route::get('/inputperizinankeluar','TentemakController@inputperizinankeluar');
    Route::get('/deleteperizinan/{id}', 'TentemakController@deleteperizinan');
    Route::get('/editperizinan/{id}','TentemakController@editperizinan');
    Route::get('/viewperizinan/{id}', 'TentemakController@viewperizinan');

    Route::post('/inputperizinan', 'TentemakController@postperizinan');
    Route::post('/inputperizinankeluar','TentemakController@postperizinankeluar');
    Route::post('/updateperizinan/{id}', 'TentemakController@updateperizinan');
    
    //galeri
    Route::get('/inputgaleri','TentemakController@inputgaleri');
    Route::get('/tambahgaleri','TentemakController@tambahgaleri');
    Route::get('/editgaleri/{id}','TentemakController@editgaleri');
    Route::get('/deletegaleri/{id}', 'TentemakController@deletegaleri');
    Route::post('/inputgaleri', 'TentemakController@postgaleri');
    Route::post('/updategaleri/{id}', 'TentemakController@updategaleri');
    

    //aduan
    Route::get('/inputaduan','TentemakController@inputaduan');
    Route::get('/viewaduan/{id}', 'TentemakController@viewaduan');
    Route::get('/editaduan/{id}', 'TentemakController@editaduan');
    Route::post('/updateaduan/{id}', 'TentemakController@updateaduan');

    //user
    Route::get('/inputuser','TentemakController@inputuser');
    Route::get('/tambahuser','TentemakController@tambahuser');
    Route::get('/edituser/{id}','TentemakController@edituser');
    Route::get('/deleteuser/{id}', 'TentemakController@deleteuser');
    Route::post('/inputuser', 'TentemakController@postuser');
    Route::post('/updateuser/{id}', 'TentemakController@updateuser');

    //pengaturan aplikasi
    Route::get('/pengaturan','TentemakController@pengaturan');
    Route::post('/pengaturan','TentemakController@savePengaturan');

    // Halaman
    Route::get('/halaman','TentemakController@halaman');
    Route::get('/halaman/tambah','TentemakController@addHalaman');
    Route::post('/halaman/tambah','TentemakController@saveHalaman');
    Route::get('/halaman/edit/{id}','TentemakController@editHalaman');
    Route::post('/halaman/edit/{id}','TentemakController@ubahHalaman');
    Route::get('/halaman/delete/{id}','TentemakController@delHalaman');

    //perizinan
    Route::get('/master-perizinan','TentemakController@masterPerizinan');
    Route::get('/master-perizinan/tambah','TentemakController@addMasterPerizinan');
    Route::post('/master-perizinan/tambah','TentemakController@saveMasterPerizinan');
    Route::get('/master-perizinan/edit/{id}','TentemakController@editMasterPerizinan');
    Route::post('/master-perizinan/edit/{id}','TentemakController@ubahMasterPerizinan');
    Route::get('/master-perizinan/add/{id}','TentemakController@addLinkMasterPerizinan');
    Route::get('/master-perizinan/delete/{id}','TentemakController@delMasterPerizinan');
    Route::get('/master-perizinan/add/{id}/file','TentemakController@LinkMasterPerizinan');
    Route::post('/master-perizinan/add/{id}/file','TentemakController@saveLinkMasterPerizinan');
    Route::get('/master-perizinan/delete/{id_izin}/file/{id_file}','TentemakController@DelLinkMasterPerizinan');

    // link terkait
    Route::get('/link','TentemakController@link');
    Route::get('/link/tambah','TentemakController@addLink');
    Route::post('/link/tambah','TentemakController@saveLink');
    Route::get('/link/edit/{id}','TentemakController@editLink');
    Route::post('/link/edit/{id}','TentemakController@ubahLink');
    Route::get('/link/delete/{id}','TentemakController@delLink');

    //slider
    Route::get('/slider','TentemakController@slider');
    Route::get('/slider/tambah','TentemakController@addSlider');
    Route::post('/slider/tambah','TentemakController@saveSlider');
    Route::get('/slider/edit/{id}','TentemakController@editSlider');
    Route::post('/slider/edit/{id}','TentemakController@ubahSlider');
    Route::get('/slider/delete/{id}','TentemakController@delSlider');
});
Auth::routes();

Route::get('/home', 'HomeController@index');
