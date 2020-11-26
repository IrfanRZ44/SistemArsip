package com.exomatik.sistemarsip.ui.main.beranda

import android.app.Activity
import android.content.Intent
import android.net.Uri
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.exomatik.sistemarsip.R
import com.exomatik.sistemarsip.model.ModelBerkas
import kotlinx.android.synthetic.main.item_berkas.view.*

class AdapterDataBeranda(
    private val listAfiliasi: ArrayList<ModelBerkas>,
    private val openPdf: (String) -> Unit,
    private val activity: Activity?
) : RecyclerView.Adapter<AdapterDataBeranda.AfiliasiHolder>() {

    inner class AfiliasiHolder(private val viewItem: View) :
        RecyclerView.ViewHolder(viewItem) {
        fun bindAfiliasi(item: ModelBerkas) {

            viewItem.textName.text = item.nama_berkas
            viewItem.textTanggal.text = item.datetime
            viewItem.setOnClickListener {
                openPdf(item.file)
            }

            viewItem.btnDownload.setOnClickListener {
                val intent = Intent()
                intent.type = Intent.ACTION_VIEW
                intent.data = Uri.parse(item.file)
                activity?.startActivity(intent)
            }
        }
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): AfiliasiHolder {
        return AfiliasiHolder(
            LayoutInflater.from(parent.context).inflate(
                R.layout.item_berkas,
                parent,
                false
            )
        )
    }

    override fun getItemCount(): Int = listAfiliasi.size
    override fun onBindViewHolder(holder: AfiliasiHolder, position: Int) {
        holder.bindAfiliasi(listAfiliasi[position])
    }
}
