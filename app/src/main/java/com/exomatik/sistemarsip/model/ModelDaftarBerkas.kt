package com.exomatik.sistemarsip.model

import android.os.Parcelable
import kotlinx.android.parcel.Parcelize

@Parcelize
data class ModelDaftarBerkas(
    var data_berkas: List<ModelBerkas> = emptyList(),
    var response: String = ""
    ) : Parcelable