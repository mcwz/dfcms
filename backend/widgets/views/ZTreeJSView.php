<script type="text/javascript">
    $(function(){

        var setting = {
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
            callback: {
                beforeClick: function(treeId, treeNode) {
                    var zTree = $.fn.zTree.getZTreeObj("tree");
                }
            }
        };


        var t = $("#tree");
        var zNodes =<?php echo $treeData; ?>;
        t = $.fn.zTree.init(t, setting, zNodes);
        var zTree = $.fn.zTree.getZTreeObj("tree");
        <?php
        if(isset($selectID) && $selectID!==null)
            echo "zTree.selectNode(zTree.getNodeByParam(\"id\", ".$selectID."));";
        ?>
    });
</script>