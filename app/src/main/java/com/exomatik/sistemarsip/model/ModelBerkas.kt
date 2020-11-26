package com.exomatik.sistemarsip.model

import android.os.Parcelable
import kotlinx.android.parcel.Parcelize

@Parcelize
data class ModelBerkas(
    var id_berkas: String = "",
    var id_arsip: String = "",
    var id_kategori: String = "",
    var nama_berkas: String = "",
    var kode_berkas: String = "",
    var deskripsi: String = "",
    var datetime: String = "",
    var file: String = ""
    ) : Parcelable