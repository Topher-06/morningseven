"use strict";
$(function() {
        const e = $(".select2"),
            t = $(".selectpicker");
        t.length && t.selectpicker(), e.length && e.each(function() {
            var e = $(this);
            e.wrap('<div class="position-relative"></div>'), e.select2({
                placeholder: "Select value",
                dropdownParent: e.parent()
            })
        })
    }),
    function() {
        const e = document.querySelector(".wizard-numbered"),
            t = [].slice.call(e.querySelectorAll(".btn-next")),
            l = [].slice.call(e.querySelectorAll(".btn-prev")),
            c = e.querySelector(".btn-submit");
        if (e, null !== e) {
            const E = new Stepper(e, {
                linear: !1
            });
            t && t.forEach(e => {
                e.addEventListener("click", e => {
                    E.next()
                })
            }), l && l.forEach(e => {
                e.addEventListener("click", e => {
                    E.previous()
                })
            }), c && c.addEventListener("click", e => {
                alert("Submitted..!!")
            })
        }
        const r = document.querySelector(".wizard-vertical"),
            n = [].slice.call(r.querySelectorAll(".btn-next")),
            i = [].slice.call(r.querySelectorAll(".btn-prev")),
            a = r.querySelector(".btn-submit");
        if (r, null !== r) {
            const m = new Stepper(r, {
                linear: !1
            });
            n && n.forEach(e => {
                e.addEventListener("click", e => {
                    m.next()
                })
            }), i && i.forEach(e => {
                e.addEventListener("click", e => {
                    m.previous()
                })
            }), a && a.addEventListener("click", e => {
                alert("Submitted..!!")
            })
        }
        const o = document.querySelector(".wizard-modern-example"),
            s = [].slice.call(o.querySelectorAll(".btn-next")),
            d = [].slice.call(o.querySelectorAll(".btn-prev")),
            u = o.querySelector(".btn-submit");
        if (o, null !== o) {
            const q = new Stepper(o, {
                linear: !1
            });
            s && s.forEach(e => {
                e.addEventListener("click", e => {
                    q.next()
                })
            }), d && d.forEach(e => {
                e.addEventListener("click", e => {
                    q.previous()
                })
            }), u && u.addEventListener("click", e => {
                alert("Submitted..!!")
            })
        }
        const v = document.querySelector(".wizard-modern-vertical"),
            S = [].slice.call(v.querySelectorAll(".btn-next")),
            p = [].slice.call(v.querySelectorAll(".btn-prev")),
            b = v.querySelector(".btn-submit");
        if (v, null !== v) {
            const y = new Stepper(v, {
                linear: !1
            });
            S && S.forEach(e => {
                e.addEventListener("click", e => {
                    y.next()
                })
            }), p && p.forEach(e => {
                e.addEventListener("click", e => {
                    y.previous()
                })
            }), b && b.addEventListener("click", e => {
                alert("Submitted..!!")
            })
        }
    }();