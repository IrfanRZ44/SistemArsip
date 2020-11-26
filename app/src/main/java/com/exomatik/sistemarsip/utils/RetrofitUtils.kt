package com.exomatik.sistemarsip.utils

import com.exomatik.sistemarsip.model.ModelDaftarBerkas
import retrofit2.Callback
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory


object RetrofitUtils{
    private val retrofit = Retrofit.Builder()
        .baseUrl(RetrofitApi.baseUrl)
        .addConverterFactory(GsonConverterFactory.create())
        .build()
    val api = retrofit.create(RetrofitApi::class.java)

    fun getDaftarBerkas(callback: Callback<ModelDaftarBerkas>){
        val body = HashMap<String, String>()
        body["method"] = "getAllDataBerkas"
        val call = api.getDaftarBerkas(body)
        call.enqueue(callback)
    }

    fun searchDataBerkas(search: String, callback: Callback<ModelDaftarBerkas>){
        val body = HashMap<String, String>()
        body["method"] = "searchDataBerkas"
        body["search"] = search
        val call = api.searchDataBerkas(body)
        call.enqueue(callback)
    }
}