package com.app.sedaya.app

import com.app.sedaya.model.ResponModel
import retrofit2.Call
import retrofit2.http.*

interface ApiService {

    @FormUrlEncoded
    @POST("register.php") //http://ws-tif.com/sedaya/API/register
    fun register(
            @Field("nama") nama :String,
            @Field("email") email :String,
            @Field("telp") telp :String,
            @Field("alamat") alamat :String,
            @Field("password") password :String
    ):Call<ResponModel>

    @FormUrlEncoded
    @POST("login.php")
    fun login(
        @Field("email") email :String,
        @Field("password") password :String
    ):Call<ResponModel>

    @FormUrlEncoded
    @PUT("update-profile.php")
    fun updateProfile(
        @Field("usr_id") usr_id : Int,
        @Field("nama") nama :String,
        @Field("telp") telp :String,
        @Field("alamat") alamat :String
    ):Call<ResponModel>

    @FormUrlEncoded
    @POST("history.php")
    fun history(
        @Field("usr_id") usr_id : Int,
    ):Call<ResponModel>

    @FormUrlEncoded
    @POST("detail-user.php")
    fun detailUser(
        @Field("usr_id") usr_id : Int,
    ):Call<ResponModel>

    @FormUrlEncoded
    @POST("pembayaran.php")
    fun pembayaran(
        @Field("no_transaksi") no_transaksi : Int
    ):Call<ResponModel>

    @FormUrlEncoded
    @POST("batal.php")
    fun batal(
        @Field("no_transaksi") no_transaksi : Int
    ):Call<ResponModel>

    @FormUrlEncoded
    @POST("konfirmasi.php")
    fun selesai(
        @Field("no_transaksi") no_transaksi : Int
    ):Call<ResponModel>

    @GET("seni.php")
    fun getSeni(): Call<ResponModel>

    @GET("rekom-seni.php")
    fun getRekomSeni(): Call<ResponModel>

    @GET("seni-terbaru.php")
    fun getSeniTerbaru(): Call<ResponModel>

    @FormUrlEncoded
    @POST("transaksi.php")
    fun transaksi(
        @Field("usr_id") usr_id : Int,
        @Field("sn_id") sn_id :String,
        @Field("tgl_kegiatan") tgl_kegiatan :String,
        @Field("harga") harga :String
    ):Call<ResponModel>
    @FormUrlEncoded
    @POST("search-seni.php")
    fun getSearch(
        @Field("query") query: String
    ):Call<ResponModel>
}