<script type="text/javascript">
    $(function(){

        var setting_<?=$treeName?> = {
            view: {
                dblClickExpand: false,
                showLine: true,
                selectedMulti: false
            },
            data: {
                simpleData: {
                    enable:true,
                    idKey: "id",
                    pIdKey: "pid",
                    rootPId: ""
                }
            },
            check:{enable:false}

        };


        var t_<?=$treeName?> = $("#<?=$treeName?>");
        var zNodes_<?=$treeName?> =<?php echo $treeData; ?>;
        <?php
        if($isForm)
        {
            echo 'setting_'.$treeName.'.check.enable=true;';
        }
        ?>

        <?='t_'.$treeName?> = $.fn.zTree.init(t_<?=$treeName?>, setting_<?=$treeName?>, zNodes_<?=$treeName?>);
        var zTree_<?=$treeName?> = $.fn.zTree.getZTreeObj("<?=$treeName?>");


        zTree_<?=$treeName?>.setting.check.chkboxType = { "Y" : "", "N" : "" };
        <?php
        if(isset($selectID) && $selectID!==null)
            echo "zTree_$treeName.selectNode(zTree_$treeName.getNodeByParam(\"id\", ".$selectID."));";

        if($expandAll)
            echo "zTree_$treeName.expandAll(true);";
        ?>

    });
</script>