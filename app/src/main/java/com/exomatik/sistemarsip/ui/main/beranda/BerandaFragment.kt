package com.exomatik.sistemarsip.ui.main.beranda

import android.view.inputmethod.EditorInfo
import android.widget.TextView
import com.exomatik.sistemarsip.R
import com.exomatik.sistemarsip.base.BaseFragmentBind
import com.exomatik.sistemarsip.databinding.FragmentBerandaBinding

class BerandaFragment : BaseFragmentBind<FragmentBerandaBinding>() {
    private lateinit var viewModel: BerandaViewModel

    override fun getLayoutResource(): Int = R.layout.fragment_beranda

    override fun myCodeHere() {
        init()
    }

    private fun init() {
        bind.lifecycleOwner = this
        viewModel = BerandaViewModel(bind.rvData, context, activity)
        bind.viewModel = viewModel
        viewModel.initAdapter()
        viewModel.getData()

        onClick()
    }

    private fun onClick() {
        bind.etSearch.editText?.setOnEditorActionListener(TextView.OnEditorActionListener { text, actionId, _ ->
            if (actionId == EditorInfo.IME_ACTION_DONE) {
                viewModel.searchData(text.text.toString())
                return@OnEditorActionListener false
            }
            false
        })
    }
}

