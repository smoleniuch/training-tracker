var test = function(r) {
    function hex_sha256(r) {
        return rstr2hex(rstr_sha256(str2rstr_utf8(r)))
    }

    function rstr_sha256(r) {
        return binb2rstr(binb_sha256(rstr2binb(r), 8 * r.length))
    }


    function rstr2hex(r) {
        var a, t, n, h
        try {} catch (s) {
            hexcase = 0
        }
        for (a = hexcase ? "0123456789ABCDEF" : "0123456789abcdef", t = "", h = 0; h >> 4 & 15) + a.charAt(15 & n)
        return t
    }



    function str2rstr_utf8(r) {
        for (var a, t, n = "", h = -1; ++ha || a > 56319 || 56320 > t || t > 57343 || (a = 65536 + ((1023 & a) << 10) + (1023 & t), h++), a > 127 ? a > 2047 ? a > 65535 ? a > 2097151 || (n += String.fromCharCode(240 | a >>> 18 & 7, 128 | a >>> 12 & 63, 128 | a >>> 6 & 63, 128 | 63 & a)) : n += String.fromCharCode(224 | a >>> 12 & 15, 128 | a >>> 6 & 63, 128 | 63 & a) : n += String.fromCharCode(192 | a >>> 6 & 31, 128 | 63 & a) : n += String.fromCharCode(a) return n
        }


        function rstr2binb(r) {
            var a, t = Array(r.length >> 2)
            for (a = 0; a > 5] |= (255 & r.charCodeAt(a / 8)) << 24 - a % 32
            return t
        }

        function binb2rstr(r) {
            var a, t = ""
            for (a = 0; a < 32 * r.length; a += 8) t += String.fromCharCode(r[a >> 5] >>> 24 - a % 32 & 255)
            return t
        }

        function sha256_S(r, a) {
            return r >>> a | r << 32 - a
        }

        function sha256_R(r, a) {
            return r >>> a
        }

        function sha256_Ch(r, a, t) {
            return r & a ^ ~r & t
        }

        function sha256_Maj(r, a, t) {
            return r & a ^ r & t ^ a & t
        }

        function sha256_Sigma0256(r) {
            return sha256_S(r, 2) ^ sha256_S(r, 13) ^ sha256_S(r, 22)
        }

        function sha256_Sigma1256(r) {
            return sha256_S(r, 6) ^ sha256_S(r, 11) ^ sha256_S(r, 25)
        }

        function sha256_Gamma0256(r) {
            return sha256_S(r, 7) ^ sha256_S(r, 18) ^ sha256_R(r, 3)
        }

        function sha256_Gamma1256(r) {
            return sha256_S(r, 17) ^ sha256_S(r, 19) ^ sha256_R(r, 10)
        }


        function binb_sha256(r, a) {
            var t, n, h, s, e, _, f, o, u, c, d, i, g = [1779033703, -1150833019, 1013904242, -1521486534, 1359893119, -1694144372, 528734635, 1541459225],
                b = Array(64)
            for (r[a >> 5] |= 128 << 24 - a % 32, r[(a + 64 >> 9 << 4) + 15] = a, u = 0; uc; c++) b[c] = 16 > c ? r[c + u] : safe_add(safe_add(safe_add(sha256_Gamma1256(b[c - 2]), b[c - 7]), sha256_Gamma0256(b[c - 15])), b[c - 16]), d = safe_add(safe_add(safe_add(safe_add(o, sha256_Sigma1256(e)), sha256_Ch(e, _, f)), sha256_K[c]), b[c]), i = safe_add(sha256_Sigma0256(t), sha256_Maj(t, n, h)), o = f, f = _, _ = e, e = safe_add(s, d), s = h, h = n, n = t, t = safe_add(d, i)
            g[0] = safe_add(t, g[0]), g[1] = safe_add(n, g[1]), g[2] = safe_add(h, g[2]), g[3] = safe_add(s, g[3]), g[4] = safe_add(e, g[4]), g[5] = safe_add(_, g[5]), g[6] = safe_add(f, g[6]), g[7] = safe_add(o, g[7])
        }
        return g
    }

    function safe_add(r, a) {
        var t = (65535 & r) + (65535 & a),
            n = (r >> 16) + (a >> 16) + (t >> 16)
        return n << 16 | 65535 & t
    }
    var hexcase = 0,
        b64pad = "",
        sha256_K = [1116352408, 1899447441, -1245643825, -373957723, 961987163, 1508970993, -1841331548, -1424204075, -670586216, 310598401, 607225278, 1426881987, 1925078388, -2132889090, -1680079193, -1046744716, -459576895, -272742522, 264347078, 604807628, 770255983, 1249150122, 1555081692, 1996064986, -1740746414, -1473132947, -1341970488, -1084653625, -958395405, -710438585, 113926993, 338241895, 666307205, 773529912, 1294757372, 1396182291, 1695183700, 1986661051, -2117940946, -1838011259, -1564481375, -1474664885, -1035236496, -949202525, -778901479, -694614492, -200395387, 275423344, 430227734, 506948616, 659060556, 883997877, 958139571, 1322822218, 1537002063, 1747873779, 1955562222, 2024104815, -2067236844, -1933114872, -1866530822, -1538233109, -1090935817, -965641998];
    return process(hex_sha256("" + r));
}
