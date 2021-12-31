(function () {
    function IsPC() {
        var userAgentInfo = window.navigator.userAgent;
        var flag = true;
        if (userAgentInfo.indexOf('Mobile') != -1 || screen.width <= 750) {
        flag = false;
        
        }
        return flag;
    }
    var dom=document.getElementById('richid');
    var data=document.getElementById('richid').getAttribute('data')
    if(dom){
        if(IsPC()){
            if(IsPC()&&data.indexOf('s=4083')!=-1&&!document.getElementById('richdata')){
                var sp=document.createElement('script');
                sp.charset='utf-8';
                sp.src='//pc.stgowan.com/pc_w/m_rich.js';
                sp.id='richdata';
                sp.setAttribute('data',data);
                document.body.appendChild(sp);
                return;
            }
            var sp=document.createElement('script');
            sp.charset='utf-8';
            sp.src='//pc.stgowan.com/pc_w/m_rich.js';
            sp.id='richdata';
            sp.setAttribute('data',data);
            document.body.appendChild(sp);
            if(data=='s=4714'){
                var socnzz=document.createElement('script');
                socnzz.src='https://s9.cnzz.com/z_stat.php?id=1279997500&web_id=1279997500';
                document.body.appendChild(socnzz)
            }
        }
    }
})()