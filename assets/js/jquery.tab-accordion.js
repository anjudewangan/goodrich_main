"use strict";

/*
 * ===========================================================
 * TABS AND ACCORDION - FRAMEWORK Y
 * ===========================================================
 * This script manage the tabs, collpse and accordion container components.
 * Documentation: www.framework-y.com/containers/others.html#tabs
 * Documentation: www.framework-y.com/containers/others.html#collapse
 * Documentation: www.framework-y.com/containers/others.html#accordion-lists
 *
 * Pixor - Copyright (c) Federico Schiocchet - Pixor - Framework Y
 */

!(function (t) {
  function i(i) {
    var a = t(i).closest(".collapse-box"),
      e = t(a).find(".panel"),
      s = t(a).attr("data-height");
    isEmpty(s) || t(e).removeClass("no-gradient");
    var n = t(this).attr("data-time");
    isEmpty(n) && (n = 500),
      t(e).animate(
        { height: isEmpty(s) ? 0 : s },
        parseInt(n, 10),
        function () {
          isEmpty(s) && (t(e).css("display", "none"), t(e).css("height", ""));
        }
      );
  }
  function a(i) {
    var a = t(i).closest(".collapse-box"),
      e = t(a).find(".panel"),
      s = t(a).attr("data-height"),
      n = t(i).attr("data-height");
    t(e).css("display", "block").css("height", "");
    var l = t(e).height();
    t(e).css("height", 0), isEmpty(n) || (l = n);
    var h = t(i).attr("data-time");
    isEmpty(h) && (h = 500),
      isEmpty(s) ||
        (t(e).css("height", s + "px"), t(e).addClass("no-gradient")),
      t(e).animate({ height: l }, parseInt(h, 10));
  }
  t(document).ready(function () {
    t("body").on("click", ".tab-box .nav li", function (i) {
      var a = t(this).find("a").attr("href");
      "#" == a && (a = null);
      var e = t(this).closest(".tab-box"),
        s = t(e).attr("data-tab-anima");
      t(e).find("> .panel, > .panel-box .panel").removeClass("active"),
        t(e).find("> .nav li").removeClass("active"),
        t(this).addClass("active");
      var n = t(e).find(
        "> .panel:eq(" +
          t(this).index() +
          "), > .panel-box .panel:eq(" +
          t(this).index() +
          ")"
      );
      if (
        (isEmpty(a) || (n = t(e).find(a)),
        t(n).addClass("active"),
        isEmpty(s) || (t(n).css("opacity", 0), t(n).showAnima(s)),
        t.isFunction(t.fn.initFlexSlider))
      ) {
        var l = 0;
        t(n)
          .find(".flexslider")
          .each(function () {
            t(this).initFlexSlider(), l++;
          }),
          l && t(window).trigger("resize").trigger("scroll");
      }
      if (t(this).closest(".mega-menu").length) return !1;
      i.preventDefault();
    }),
      t("body").on("click", "header .mega-tabs", function () {
        t(this).find(".nav-tabs li:first-child").addClass("active");
      }),
      t(".tab-box.left,.tab-box.right").each(function () {
        var i = t(this).find(".nav"),
          a = t(this).find(".panel-box");
        t(a).outerHeight() < t(i).outerHeight()
          ? t(a)
              .find(".panel")
              .css("height", t(i).outerHeight() + "px")
          : t(i).css("height", t(a).find(".panel").outerHeight() + "px");
      }),
      t(".nav.nav-justified-v").each(function () {
        var i = t(this).find("li").length,
          a = t(this).find("li a");
        t(a).css("height", t(this).outerHeight() / i + "px"),
          t(a).css("line-height", t(a).height() + "px");
      }),
      t("*[data-height].collapse-box").each(function () {
        var i = t(this).find(".panel");
        t(i).css("height", t(this).attr("data-height") + "px"), t(i).show();
      }),
      t(".accordion-list[data-open]").each(function () {
        var i = t(this).attr("data-open");
        t(this)
          .find(".list-group-item")
          .eq(parseInt(i, 10) - 1)
          .find("a")
          .click();
      });
  }),
    t(".collapse-box .collapse-button").toggleClick(
      function () {
        var i = this;
        a(i);
        var e = t(i).attr("data-button-open-text");
        isEmpty(e) ||
          (t(i).attr("data-button-close-text", t(this).find("b").html()),
          setTimeout(function () {
            t(i).find("b").html(e);
          }, 500));
      },
      function () {
        var a = this;
        i(a);
        var e = t(a).attr("data-button-close-text");
        isEmpty(e) ||
          setTimeout(function () {
            t(a).find("b").html(e);
          }, 500);
      }
    ),
    t("body").on("click", ".accordion-list .list-group-item > a", function () {
      var i = t(this).closest(".accordion-list"),
        a = t(this).closest(".list-group-item"),
        e = t(i).attr("data-type"),
        s = t(i).attr("data-time"),
        n = t(i).attr("data-height"),
        l = t(i).find(".active-panel .panel");
      if (
        (t(i).find(".list-group-item").removeClass("active-panel"),
        isEmpty(e) && (e = ""),
        t(t(i).find(".panel")).each(function () {
          t(this).clearQueue();
        }),
        t(this).hasClass("active") ||
          "block" == t(a).find(".panel").css("display"))
      ) {
        t(this).removeClass("active");
        var h = t(a).find(".panel");
        isEmpty(s) && (s = 500),
          t(h).animate({ height: 0 }, s, function () {
            t(h).css("display", "none").css("height", "");
          });
      } else {
        var o = 0,
          c = t(i).find(".list-group-item > a");
        t(c).each(function () {
          t(this).hasClass("active") && (o = 300);
        }),
          t(c).removeClass("active"),
          t(this).addClass("active"),
          t(a).addClass("active-panel"),
          "visible" == e
            ? t(t(a).find(".panel")).collapse({ milliseconds: s, height: n })
            : (t(l).animate({ height: 0 }, o, function () {
                t(l).css("display", "none").css("height", "");
              }),
              "accordion" == e
                ? t(a).find(".panel").collapse({ milliseconds: s, height: n })
                : t(l)
                    .promise()
                    .done(function () {
                      t(a)
                        .find(".panel")
                        .collapse({ milliseconds: s, height: n });
                    }));
      }
    }),
    (t.fn.collapse = function (i) {
      var a = "",
        e = "";
      isEmpty(i) || ((a = i.milliseconds), (e = i.height)),
        isEmpty(a) && (a = 500);
      var s = this;
      t(s).css("display", "block");
      var n = t(s).height();
      t(s).css("height", "0px"),
        isEmpty(e) || (n = e),
        t(s).animate({ height: n }, parseInt(a, 10));
    });
})(jQuery);


/* 
 * jquery.flipster
 * built 2015-03-06 
*/

"use strict";
!function (n) {
    n.fn.flipster = function (t) {
        var u = "string" == typeof t ? !0 : !1, f, e;
        if (u) f = t, e = Array.prototype.slice.call(arguments, 1);
        else var o = { itemContainer: "ul", itemSelector: "li", style: "coverflow", start: "center", enableKeyboard: !0, enableMousewheel: !0, enableTouch: !0, onItemSwitch: n.noop, disableRotation: !1, enableNav: !1, navPosition: "before", enableNavButtons: !1, prevText: "Previous", nextText: "Next" },
        i = n.extend({},
        o, t),
        r = n(window);
        return this.each(function () {
            function g() { l = 0 }
            function y() {
                c.height(nt());
                s.css("height", "auto");
                "carousel" === i.style && c.width(t.width())
            }
            function nt() {
                var i = 0; return t.each(function () { n(this).height() > i && (i = n(this).height()) }),
                i
            }
            function tt() {
                var f, e, c;
                if (i.enableNav && t.length > 1) {
                    var u = [], o = [], r = []; t.each(function () {
                        var t = n(this).data("flip-category"),
                        i = n(this).attr("id"),
                        e = n(this).attr("title"),
                        f; ("undefined" != typeof t && n.inArray(t, u) < 0 && (u.push(t),
                        r[t] = '<li class="flip-nav-category"><a href="#" class="flip-nav-category-link" data-flip-category="' + t + '">' + t + '<\/a>\n<ul class="flip-nav-items">\n'),
                        n.inArray(i, o) < 0) && (o.push(i),
                        f = '<a href="#' + i + '" class="flip-nav-item-link">' + e + "<\/a><\/li>\n", "undefined" != typeof t ? r[t] = r[t] + '<li class="flip-nav-item">' + f : r[i] = '<li class="flip-nav-item no-category">' + f)
                    });
                    f = '<ul class="flipster-nav">\n'; for (e in u) r[u[e]] = r[u[e]] + "<\/ul>\n<\/li>\n"; for (c in r) f += r[c]; f += "<\/ul>"; w = "after" != i.navPosition.toLowerCase() ? n(f).prependTo(s) : n(f).appendTo(s);
                    b = w.find("a").on("click", function (i) {
                        var r; r = n(this).hasClass("flip-nav-category-link") ? t.filter("[data-flip-category='" + n(this).data("flip-category") + "']") : n(this.hash);
                        r.length && (h(r),
                        i.preventDefault())
                    })
                }
            }
            function it() {
                if (i.enableNav && t.length > 1) {
                    var r = n(t[o]);
                    w.find(".flip-nav-current").removeClass("flip-nav-current");
                    b.filter("[href='#" + r.attr("id") + "']").addClass("flip-nav-current");
                    b.filter("[data-flip-category='" + r.data("flip-category") + "']").parent().addClass("flip-nav-current")
                }
            }
            function rt() {
                i.enableNavButtons && t.length > 1 && (s.find(".flipto-prev, .flipto-next").remove(),
                s.append("<a href='#' class='flipto-prev'>" + i.prevText + "<\/a> <a href='#' class='flipto-next'>" + i.nextText + "<\/a>"),
                s.children(".flipto-prev").on("click", function (n) {
                    h("left");
                    n.preventDefault()
                }),
                s.children(".flipto-next").on("click", function (n) {
                    h("right");
                    n.preventDefault()
                }))
            }
            function p() {
                var u = n(t[o]).addClass("flip-current"),
                r, f, a, v, e, p;
                if (t.removeClass("flip-prev flip-next flip-current flip-past flip-future no-transition"),
                "carousel" === i.style) {
                    t.addClass("flip-hidden");
                    var w = n(t[o + 1]),
                    s = n(t[o + 2]),
                    h = n(t[o - 1]),
                    l = n(t[o - 2]);
                    0 === o ? (h = t.last(),
                    l = h.prev()) : 1 === o ? l = t.last() : o === t.length - 2 ? s = t.first() : o === t.length - 1 && (w = t.first(),
                    s = n(t[1]));
                    s.removeClass("flip-hidden").addClass("flip-future");
                    l.removeClass("flip-hidden").addClass("flip-past");
                    w.removeClass("flip-hidden").addClass("flip-next");
                    h.removeClass("flip-hidden").addClass("flip-prev")
                }
                else {
                    var b = u.outerWidth() / 2, k = 0, tt = c.width(),
                    g = u.outerWidth(),
                    nt = t.index(u) * g / 2 + b / 2; for (t.removeClass("flip-hidden"),
                    r = 0; r < t.length; r++) f = n(t[r]),
                    a = f.outerWidth(),
                    o > r ? f.addClass("flip-past").css({ "z-index": r, left: r * a / 2 + 50 + "px" }) : r > o && f.addClass("flip-future").css({ "z-index": t.length - r, left: r * a / 2 - 50 + b + "px" });

                    if (u.css({ "z-index": t.length + 1, left: nt + "px" }),
                    k = nt + g / 2 - tt / 2, v = -1 * k + "px", d) {
                        for (e = n(".flip-past"),
                        p = n(".flip-future"),
                        n(".flip-current").css("zoom", "1.0"),
                        r = 0; r < e.length; r++) n(e[r]).css("zoom", 100 - 5 * (e.length - r) + "%");
                        for (r = 0; r < p.length; r++) n(p[r]).css("zoom", 100 - 5 * (r + 1) + "%");
                        c.animate({ left: v },
                        333)
                    }
                    else c.css("left", v)
                }
                u.addClass("flip-current").removeClass("flip-prev flip-next flip-past flip-future flip-hidden");
                y();
                it();
                i.onItemSwitch.call(this)
            }
            function h(n) {
                t.length > 1 && ("left" === n ? o > 0 ? o-- : o = t.length - 1 : "right" === n ? o < t.length - 1 ? o++ : o = 0 : o = "number" == typeof n ? n : t.index(n),
                p())
            }
            function ut() {
                var f, u, e; s.addClass("flipster flipster-active flipster-" + i.style).css("visibility", "hidden");
                i.disableRotation && s.addClass("no-rotate");
                c = s.find(i.itemContainer).addClass("flip-items");
                t = c.find(i.itemSelector).addClass("flip-item flip-hidden").wrapInner("<div class='flip-content' />");
                f = !1; u = document.createElement("b");
                u.innerHTML = "<!--[if IE 9]><i><\/i><![endif]-->"; e = 1 === u.getElementsByTagName("i").length; (f || e) && (d = !0, c.addClass("compatibility"));
                tt();
                rt();
                i.start && t.length > 1 && (o = "center" === i.start ? !t.length % 2 ? t.length / 2 + 1 : Math.floor(t.length / 2) : i.start);
                y();
                s.hide().css("visibility", "visible").fadeIn(400, function () { p() });
                r.on("resize.flipster", function () {
                    y();
                    p()
                });
                t.on("click", function (i) {
                    n(this).hasClass("flip-current") || i.preventDefault();
                    h(t.index(this))
                });
                i.enableKeyboard && t.length > 1 && (r.on("keydown.flipster", function (n) {
                    if (l++, l % 7 == 0 || 1 === l) {
                        var t = n.which; 37 === t ? (n.preventDefault(),
                        h("left")) : 39 === t && (n.preventDefault(),
                        h("right"))
                    }
                }),
                r.on("keyup.flipster", function () { l = 0 }));
                i.enableMousewheel && t.length > 1 && s.on("mousewheel.flipster", function (n) {
                    k = window.setTimeout(g, 500);
                    l++; (l % 4 == 0 || 1 === l) && (window.clearTimeout(k),
                    h(n.originalEvent.wheelDelta / 120 > 0 ? "left" : "right"),
                    n.preventDefault())
                });
                i.enableTouch && t.length > 1 && (s.on("touchstart.flipster", function (n) { a = n.originalEvent.targetTouches[0].screenX }),
                s.on("touchmove.flipster", function (n) {
                    n.preventDefault();
                    var i = n.originalEvent.targetTouches[0].screenX, r = i - a; r > t[0].clientWidth / 1.75 ? (h("left"),
                    a = i) : r < -1 * (t[0].clientWidth / 1.75) && (h("right"),
                    a = i)
                }),
                s.on("touchend.flipster", function () { a = 0 }))
            }
            var v, s = n(this);

            if (u) return v = s.data("methods"),
            v[f].apply(this, e);
            var c, t, w, b, k, d, o = 0, a = 0, l = 0; v = { jump: h };
            s.data("methods", v);
            s.hasClass("flipster-active") || ut()
        })
    }
}(jQuery);



/*!
 * imagesLoaded PACKAGED v3.1.8
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */

"use strict";
(function () { function e() { } function t(e, t) { for (var n = e.length; n--;) if (e[n].listener === t) return n; return -1 } function n(e) { return function () { return this[e].apply(this, arguments) } } var i = e.prototype, r = this, o = r.EventEmitter; i.getListeners = function (e) { var t, n, i = this._getEvents(); if ("object" == typeof e) { t = {}; for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n]) } else t = i[e] || (i[e] = []); return t }, i.flattenListeners = function (e) { var t, n = []; for (t = 0; e.length > t; t += 1) n.push(e[t].listener); return n }, i.getListenersAsObject = function (e) { var t, n = this.getListeners(e); return n instanceof Array && (t = {}, t[e] = n), t || n }, i.addListener = function (e, n) { var i, r = this.getListenersAsObject(e), o = "object" == typeof n; for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : { listener: n, once: !1 }); return this }, i.on = n("addListener"), i.addOnceListener = function (e, t) { return this.addListener(e, { listener: t, once: !0 }) }, i.once = n("addOnceListener"), i.defineEvent = function (e) { return this.getListeners(e), this }, i.defineEvents = function (e) { for (var t = 0; e.length > t; t += 1) this.defineEvent(e[t]); return this }, i.removeListener = function (e, n) { var i, r, o = this.getListenersAsObject(e); for (r in o) o.hasOwnProperty(r) && (i = t(o[r], n), -1 !== i && o[r].splice(i, 1)); return this }, i.off = n("removeListener"), i.addListeners = function (e, t) { return this.manipulateListeners(!1, e, t) }, i.removeListeners = function (e, t) { return this.manipulateListeners(!0, e, t) }, i.manipulateListeners = function (e, t, n) { var i, r, o = e ? this.removeListener : this.addListener, s = e ? this.removeListeners : this.addListeners; if ("object" != typeof t || t instanceof RegExp) for (i = n.length; i--;) o.call(this, t, n[i]); else for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : s.call(this, i, r)); return this }, i.removeEvent = function (e) { var t, n = typeof e, i = this._getEvents(); if ("string" === n) delete i[e]; else if ("object" === n) for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t]; else delete this._events; return this }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function (e, t) { var n, i, r, o, s = this.getListenersAsObject(e); for (r in s) if (s.hasOwnProperty(r)) for (i = s[r].length; i--;) n = s[r][i], n.once === !0 && this.removeListener(e, n.listener), o = n.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, n.listener); return this }, i.trigger = n("emitEvent"), i.emit = function (e) { var t = Array.prototype.slice.call(arguments, 1); return this.emitEvent(e, t) }, i.setOnceReturnValue = function (e) { return this._onceReturnValue = e, this }, i._getOnceReturnValue = function () { return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0 }, i._getEvents = function () { return this._events || (this._events = {}) }, e.noConflict = function () { return r.EventEmitter = o, e }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () { return e }) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e }).call(this), function (e) { function t(t) { var n = e.event; return n.target = n.target || n.srcElement || t, n } var n = document.documentElement, i = function () { }; n.addEventListener ? i = function (e, t, n) { e.addEventListener(t, n, !1) } : n.attachEvent && (i = function (e, n, i) { e[n + i] = i.handleEvent ? function () { var n = t(e); i.handleEvent.call(i, n) } : function () { var n = t(e); i.call(e, n) }, e.attachEvent("on" + n, e[n + i]) }); var r = function () { }; n.removeEventListener ? r = function (e, t, n) { e.removeEventListener(t, n, !1) } : n.detachEvent && (r = function (e, t, n) { e.detachEvent("on" + t, e[t + n]); try { delete e[t + n] } catch (i) { e[t + n] = void 0 } }); var o = { bind: i, unbind: r }; "function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o }(this), function (e, t) { "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function (n, i) { return t(e, n, i) }) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie) }(window, function (e, t, n) { function i(e, t) { for (var n in t) e[n] = t[n]; return e } function r(e) { return "[object Array]" === d.call(e) } function o(e) { var t = []; if (r(e)) t = e; else if ("number" == typeof e.length) for (var n = 0, i = e.length; i > n; n++) t.push(e[n]); else t.push(e); return t } function s(e, t, n) { if (!(this instanceof s)) return new s(e, t); "string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), a && (this.jqDeferred = new a.Deferred); var r = this; setTimeout(function () { r.check() }) } function f(e) { this.img = e } function c(e) { this.src = e, v[e] = this } var a = e.jQuery, u = e.console, h = u !== void 0, d = Object.prototype.toString; s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function () { this.images = []; for (var e = 0, t = this.elements.length; t > e; e++) { var n = this.elements[e]; "IMG" === n.nodeName && this.addImage(n); var i = n.nodeType; if (i && (1 === i || 9 === i || 11 === i)) for (var r = n.querySelectorAll("img"), o = 0, s = r.length; s > o; o++) { var f = r[o]; this.addImage(f) } } }, s.prototype.addImage = function (e) { var t = new f(e); this.images.push(t) }, s.prototype.check = function () { function e(e, r) { return t.options.debug && h && u.log("confirm", e, r), t.progress(e), n++, n === i && t.complete(), !0 } var t = this, n = 0, i = this.images.length; if (this.hasAnyBroken = !1, !i) return this.complete(), void 0; for (var r = 0; i > r; r++) { var o = this.images[r]; o.on("confirm", e), o.check() } }, s.prototype.progress = function (e) { this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded; var t = this; setTimeout(function () { t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e) }) }, s.prototype.complete = function () { var e = this.hasAnyBroken ? "fail" : "done"; this.isComplete = !0; var t = this; setTimeout(function () { if (t.emit(e, t), t.emit("always", t), t.jqDeferred) { var n = t.hasAnyBroken ? "reject" : "resolve"; t.jqDeferred[n](t) } }) }, a && (a.fn.imagesLoaded = function (e, t) { var n = new s(this, e, t); return n.jqDeferred.promise(a(this)) }), f.prototype = new t, f.prototype.check = function () { var e = v[this.img.src] || new c(this.img.src); if (e.isConfirmed) return this.confirm(e.isLoaded, "cached was confirmed"), void 0; if (this.img.complete && void 0 !== this.img.naturalWidth) return this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), void 0; var t = this; e.on("confirm", function (e, n) { return t.confirm(e.isLoaded, n), !0 }), e.check() }, f.prototype.confirm = function (e, t) { this.isLoaded = e, this.emit("confirm", this, t) }; var v = {}; return c.prototype = new t, c.prototype.check = function () { if (!this.isChecked) { var e = new Image; n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0 } }, c.prototype.handleEvent = function (e) { var t = "on" + e.type; this[t] && this[t](e) }, c.prototype.onload = function (e) { this.confirm(!0, "onload"), this.unbindProxyEvents(e) }, c.prototype.onerror = function (e) { this.confirm(!1, "onerror"), this.unbindProxyEvents(e) }, c.prototype.confirm = function (e, t) { this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t) }, c.prototype.unbindProxyEvents = function (e) { n.unbind(e.target, "load", this), n.unbind(e.target, "error", this) }, s });