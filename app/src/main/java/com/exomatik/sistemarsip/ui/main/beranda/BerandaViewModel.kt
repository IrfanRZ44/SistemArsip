package com.exomatik.sistemarsip.ui.main.beranda

import android.app.Activity
import android.content.Context
import android.content.Intent
import androidx.recyclerview.widget.LinearLayoutManager
import androidx.recyclerview.widget.RecyclerView
import com.exomatik.sistemarsip.base.BaseViewModel
import com.exomatik.sistemarsip.model.ModelBerkas
import com.exomatik.sistemarsip.model.ModelDaftarBerkas
import com.exomatik.sistemarsip.utils.Constant.noData
import com.exomatik.sistemarsip.utils.DetailPDFActivity
import com.exomatik.sistemarsip.utils.RetrofitUtils
import com.exomatik.sistemarsip.utils.showLog
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class BerandaViewModel(
    private val rcData: RecyclerView,
    private val context: Context?,
    private val activity: Activity?
) : BaseViewModel() {
    val listData = ArrayList<ModelBerkas>()
    var adapter: AdapterDataBeranda? = null

    fun initAdapter() {
        adapter = AdapterDataBeranda(
            listData,
            { urlFile: String -> openPdf(urlFile) },
            activity
        )
        rcData.layoutManager = LinearLayoutManager(context, LinearLayoutManager.VERTICAL, false)
        rcData.adapter = adapter
        rcData.isNestedScrollingEnabled = false
    }

    fun cekList() {
        isShowLoading.value = false

        if (listData.size == 0) status.value = noData
        else status.value = ""
    }

    fun getData(){
        listData.clear()
        RetrofitUtils.getDaftarBerkas(
            object : Callback<ModelDaftarBerkas> {
                override fun onResponse(
                    call: Call<ModelDaftarBerkas>,
                    response: Response<ModelDaftarBerkas>
                ) {
                    isShowLoading.value = false
                    val result = response.body()

                    if (result != null && result.response == "Success"){
                        for (i in result.data_berkas.indices){
                            listData.add(result.data_berkas[i])
                            adapter?.notifyDataSetChanged()
                        }
                        sortingData()
                    }
                    else{
                        cekList()
                    }
                }

                override fun onFailure(
                    call: Call<ModelDaftarBerkas>,
                    t: Throwable
                ) {
                    isShowLoading.value = false
                    cekList()
                }
            })
    }

    fun searchData(search: String){
        listData.clear()
        RetrofitUtils.searchDataBerkas(search,
            object : Callback<ModelDaftarBerkas> {
                override fun onResponse(
                    call: Call<ModelDaftarBerkas>,
                    response: Response<ModelDaftarBerkas>
                ) {
                    isShowLoading.value = false
                    val result = response.body()

                    if (result != null && result.response == "Success"){
                        for (i in result.data_berkas.indices){
                            listData.add(result.data_berkas[i])
                            adapter?.notifyDataSetChanged()
                        }
                        sortingData()
                    }
                    else{
                        cekList()
                    }
                }

                override fun onFailure(
                    call: Call<ModelDaftarBerkas>,
                    t: Throwable
                ) {
                    isShowLoading.value = false
                    cekList()
                }
            })
    }

    private fun sortingData() {
        val listSorted = listData.sortedWith(compareBy { it.nama_berkas })
        listData.clear()
        for (i: Int in listSorted.indices) {
            if (listData.size < 5) {
                listData.add(listSorted[i])
                adapter?.notifyDataSetChanged()
            }
        }

        cekList()
    }

    private fun openPdf(urlFile: String) {
        val intent = Intent(activity, DetailPDFActivity::class.java)
        intent.putExtra("urlFile", urlFile)
        activity?.startActivity(intent)
    }
}