{*
/*
* @CODOLICENSE
*/
*}
{* Smarty *}
{extends file='layout.tpl'}

{block name=body}
    <div class="codo_container">

        <div id="breadcrumb">
            {"block_breadcrumbs_before"|load_block}            
            <a href="{$smarty.const.RURI}{$site_url}">{$home_title}</a>
            {_t("Search")}
            {"block_breadcrumbs_after"|load_block}                        
        </div>


        <div class="row">

            <div class="codo_widget">
                <div class="codo_widget-header">
                    {_t("Search result")}
                </div>

                <div class="codo_widget-content">
                </div>
            </div>
        </div>

        {include file='forum/editor.tpl'}
    </div>
{/block}