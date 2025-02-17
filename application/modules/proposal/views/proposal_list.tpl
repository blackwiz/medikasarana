{* Extend our master template *}
{extends file="../../../master.tpl"}

{block name=content}

    <div class="panel panel-default">

        <div class="panel-heading"><h6 class="panel-title">Daftar Proposal</h6></div>

        <div class="panel-body">
            <div class="block-inner">
                <h6 class="heading-hr">
                    <i class="icon-clipboard"></i> Informasi detail proposal
                    <small class="display-block">Informasi umum tentang detail proposal</small>
                </h6>
            </div>
            {if $success}
                <div class="callout callout-success fade in">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <p>{$success}</p>
                </div>
            {/if}
            <div class="datatable-tools">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>No Proposal</th>
                        <th>Nama Konsumen</th>
                        <th>Tanggal Pembuatan</th>
                        <th>Staff</th>
                        <th>Jenis Proposal</th>
                        <th>PPN Status</th>
                        <th width="300px">Pilihan</th>
                    </tr>
                    </thead>
                    <tbody>
                    {assign var=val value=1}
                    {foreach $items as $key }
                        <tr>
                            <td>{$val}</td>
                            <td>{$key->id_proposal}</td>
                            <td>{$key->customer_name}</td>
                            <td>{$key->date_created}</td>
                            <td>{$key->staff_name}</td>
                            <td>{$array_proposal_type[$key->type]}</td>
                            <td>{$array_status_ppn[$key->status_ppn]}</td>
                            <td>
                                <div class="table-controls">

                                    <a href="{base_url('proposal/checkout')}/{$key->id_proposal}"
                                       class="button btn btn-warning ">
                                        Rincian
                                    </a>

                                    {if $key->status == 0}
                                        <a href="{base_url('proposal/approve')}/{$key->id_proposal}"
                                           class="button btn btn-success "
                                           onclick="return confirm('Proposal {$key->id_proposal} telah di terima oleh {$key->customer_name}')">
                                            Ganti status
                                        </a>
                                    {else}
                                        <a href="{base_url('sales-order/')}/{$key->id_proposal}"
                                           class="button btn btn-success ">
                                            Sales Order
                                        </a>
                                        {*{if $key->type == 0}*}
                                            <a href="{base_url('proposal/edit')}/{$key->id_proposal}"
                                               class="button btn btn-default ">
                                                Ubah
                                            </a>
                                        {*{/if}*}
                                    {/if}
                                    <a href="{base_url('proposal/usang')}/{$key->id_proposal}"
                                       class="button btn btn-primary "
                                       onclick="return confirm('Proposal {$key->id_proposal} akan dipindahkan di data history')">
                                        Hapus
                                    </a>

                                    <!-- <a href="{base_url('proposal/delete')}/{$key->id_proposal}"
                                       class="button btn btn-danger "
                                       onclick="return confirm('Proposal {$key->id_proposal} akan di hapus')">
                                        Hapus
                                    </a> -->
                                </div>
                            </td>
                        </tr>
                        {assign var=val value=$val+1}
                    {/foreach}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /default panel -->

{/block}
