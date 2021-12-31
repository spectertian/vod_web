(function () {
    function IsPC() {
        var ua = window.navigator.userAgent;
        var isSafari = ua.indexOf("Safari") != -1 && ua.indexOf("Version") != -1;
        var isIphone = ua.indexOf("iPhone") != -1 && ua.indexOf("Version") != -1
        var isIPad = isSafari && !isIphone && 'ontouchend' in document;
        var flag = true;
        if (ua.indexOf('Mobile') != -1 || screen.width <= 750 || isIPad) {
            flag = false;

        }
        return flag;

    }
    var dom = document.getElementById('beitouid');
    var data = document.getElementById('beitouid').getAttribute('data');
    if (dom) {

        if (IsPC() && data.indexOf('s=4082') != -1 && !document.getElementById('beitoudata')) {
            var sp = document.createElement('script');
            sp.src = '//pc.stgowan.com/pc_w/m_beitou.js';
            sp.id = 'beitoudata';
            sp.setAttribute('data', data)
            document.body.appendChild(sp);
            return;
        }
        if (IsPC()) {
            var sp = document.createElement('script');
            sp.src = '//pc.stgowan.com/pc_w/m_beitou.js';
            sp.id = 'beitoudata';
            sp.setAttribute('data', data)
            document.body.appendChild(sp);
        }

    }
})()