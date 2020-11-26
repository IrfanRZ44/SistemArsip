package com.exomatik.sistemarsip.utils

import com.exomatik.sistemarsip.model.ModelDaftarBerkas
import retrofit2.Call
import retrofit2.http.*

/**
 * Created by IrfanRZ on 02/08/2019.
 */
interface RetrofitApi {
    @POST("api.php")
    fun getDaftarBerkas(@Body input: Map<String, String>): Call<ModelDaftarBerkas>

    @POST("api.php")
    fun searchDataBerkas(@Body input: Map<String, String>): Call<ModelDaftarBerkas>

    companion object {
        const val baseUrl = Constant.defaultBaseUrl
    }
}