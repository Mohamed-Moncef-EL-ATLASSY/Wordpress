! function (e, t) {
	"object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : (e = e || self).Swiper = t()
}(this, (function () {
	"use strict";

	function e(e) {
		return null !== e && "object" == typeof e && "constructor" in e && e.constructor === Object
	}

	function t(i, s) {
		void 0 === i && (i = {}), void 0 === s && (s = {}), Object.keys(s).forEach((function (a) {
			void 0 === i[a] ? i[a] = s[a] : e(s[a]) && e(i[a]) && Object.keys(s[a]).length > 0 && t(i[a], s[a])
		}))
	}
	var i = "undefined" != typeof document ? document : {},
		s = {
			body: {},
			addEventListener: function () {},
			removeEventListener: function () {},
			activeElement: {
				blur: function () {},
				nodeName: ""
			},
			querySelector: function () {
				return null
			},
			querySelectorAll: function () {
				return []
			},
			getElementById: function () {
				return null
			},
			createEvent: function () {
				return {
					initEvent: function () {}
				}
			},
			createElement: function () {
				return {
					children: [],
					childNodes: [],
					style: {},
					setAttribute: function () {},
					getElementsByTagName: function () {
						return []
					}
				}
			},
			createElementNS: function () {
				return {}
			},
			importNode: function () {
				return null
			},
			location: {
				hash: "",
				host: "",
				hostname: "",
				href: "",
				origin: "",
				pathname: "",
				protocol: "",
				search: ""
			}
		};
	t(i, s);
	var a = "undefined" != typeof window ? window : {};
	t(a, {
		document: s,
		navigator: {
			userAgent: ""
		},
		location: {
			hash: "",
			host: "",
			hostname: "",
			href: "",
			origin: "",
			pathname: "",
			protocol: "",
			search: ""
		},
		history: {
			replaceState: function () {},
			pushState: function () {},
			go: function () {},
			back: function () {}
		},
		CustomEvent: function () {
			return this
		},
		addEventListener: function () {},
		removeEventListener: function () {},
		getComputedStyle: function () {
			return {
				getPropertyValue: function () {
					return ""
				}
			}
		},
		Image: function () {},
		Date: function () {},
		screen: {},
		setTimeout: function () {},
		clearTimeout: function () {},
		matchMedia: function () {
			return {}
		}
	});
	var r = function (e) {
		for (var t = 0; t < e.length; t += 1) this[t] = e[t];
		return this.length = e.length, this
	};

	function n(e, t) {
		var s = [],
			n = 0;
		if (e && !t && e instanceof r) return e;
		if (e)
			if ("string" == typeof e) {
				var o, l, d = e.trim();
				if (d.indexOf("<") >= 0 && d.indexOf(">") >= 0) {
					var h = "div";
					for (0 === d.indexOf("<li") && (h = "ul"), 0 === d.indexOf("<tr") && (h = "tbody"), 0 !== d.indexOf("<td") && 0 !== d.indexOf("<th") || (h = "tr"), 0 === d.indexOf("<tbody") && (h = "table"), 0 === d.indexOf("<option") && (h = "select"), (l = i.createElement(h)).innerHTML = d, n = 0; n < l.childNodes.length; n += 1) s.push(l.childNodes[n])
				} else
					for (o = t || "#" !== e[0] || e.match(/[ .<>:~]/) ? (t || i).querySelectorAll(e.trim()) : [i.getElementById(e.trim().split("#")[1])], n = 0; n < o.length; n += 1) o[n] && s.push(o[n])
			} else if (e.nodeType || e === a || e === i) s.push(e);
		else if (e.length > 0 && e[0].nodeType)
			for (n = 0; n < e.length; n += 1) s.push(e[n]);
		return new r(s)
	}

	function o(e) {
		for (var t = [], i = 0; i < e.length; i += 1) - 1 === t.indexOf(e[i]) && t.push(e[i]);
		return t
	}
	n.fn = r.prototype, n.Class = r, n.Dom7 = r;
	var l = {
		addClass: function (e) {
			if (void 0 === e) return this;
			for (var t = e.split(" "), i = 0; i < t.length; i += 1)
				for (var s = 0; s < this.length; s += 1) void 0 !== this[s] && void 0 !== this[s].classList && this[s].classList.add(t[i]);
			return this
		},
		removeClass: function (e) {
			for (var t = e.split(" "), i = 0; i < t.length; i += 1)
				for (var s = 0; s < this.length; s += 1) void 0 !== this[s] && void 0 !== this[s].classList && this[s].classList.remove(t[i]);
			return this
		},
		hasClass: function (e) {
			return !!this[0] && this[0].classList.contains(e)
		},
		toggleClass: function (e) {
			for (var t = e.split(" "), i = 0; i < t.length; i += 1)
				for (var s = 0; s < this.length; s += 1) void 0 !== this[s] && void 0 !== this[s].classList && this[s].classList.toggle(t[i]);
			return this
		},
		attr: function (e, t) {
			var i = arguments;
			if (1 === arguments.length && "string" == typeof e) return this[0] ? this[0].getAttribute(e) : void 0;
			for (var s = 0; s < this.length; s += 1)
				if (2 === i.length) this[s].setAttribute(e, t);
				else
					for (var a in e) this[s][a] = e[a], this[s].setAttribute(a, e[a]);
			return this
		},
		removeAttr: function (e) {
			for (var t = 0; t < this.length; t += 1) this[t].removeAttribute(e);
			return this
		},
		data: function (e, t) {
			var i;
			if (void 0 !== t) {
				for (var s = 0; s < this.length; s += 1)(i = this[s]).dom7ElementDataStorage || (i.dom7ElementDataStorage = {}), i.dom7ElementDataStorage[e] = t;
				return this
			}
			if (i = this[0]) {
				if (i.dom7ElementDataStorage && e in i.dom7ElementDataStorage) return i.dom7ElementDataStorage[e];
				var a = i.getAttribute("data-" + e);
				return a || void 0
			}
		},
		transform: function (e) {
			for (var t = 0; t < this.length; t += 1) {
				var i = this[t].style;
				i.webkitTransform = e, i.transform = e
			}
			return this
		},
		transition: function (e) {
			"string" != typeof e && (e += "ms");
			for (var t = 0; t < this.length; t += 1) {
				var i = this[t].style;
				i.webkitTransitionDuration = e, i.transitionDuration = e
			}
			return this
		},
		on: function () {
			for (var e, t = [], i = arguments.length; i--;) t[i] = arguments[i];
			var s = t[0],
				a = t[1],
				r = t[2],
				o = t[3];

			function l(e) {
				var t = e.target;
				if (t) {
					var i = e.target.dom7EventData || [];
					if (i.indexOf(e) < 0 && i.unshift(e), n(t).is(a)) r.apply(t, i);
					else
						for (var s = n(t).parents(), o = 0; o < s.length; o += 1) n(s[o]).is(a) && r.apply(s[o], i)
				}
			}

			function d(e) {
				var t = e && e.target && e.target.dom7EventData || [];
				t.indexOf(e) < 0 && t.unshift(e), r.apply(this, t)
			}
			"function" == typeof t[1] && (s = (e = t)[0], r = e[1], o = e[2], a = void 0), o || (o = !1);
			for (var h, p = s.split(" "), c = 0; c < this.length; c += 1) {
				var u = this[c];
				if (a)
					for (h = 0; h < p.length; h += 1) {
						var v = p[h];
						u.dom7LiveListeners || (u.dom7LiveListeners = {}), u.dom7LiveListeners[v] || (u.dom7LiveListeners[v] = []), u.dom7LiveListeners[v].push({
							listener: r,
							proxyListener: l
						}), u.addEventListener(v, l, o)
					} else
						for (h = 0; h < p.length; h += 1) {
							var f = p[h];
							u.dom7Listeners || (u.dom7Listeners = {}), u.dom7Listeners[f] || (u.dom7Listeners[f] = []), u.dom7Listeners[f].push({
								listener: r,
								proxyListener: d
							}), u.addEventListener(f, d, o)
						}
			}
			return this
		},
		off: function () {
			for (var e, t = [], i = arguments.length; i--;) t[i] = arguments[i];
			var s = t[0],
				a = t[1],
				r = t[2],
				n = t[3];
			"function" == typeof t[1] && (s = (e = t)[0], r = e[1], n = e[2], a = void 0), n || (n = !1);
			for (var o = s.split(" "), l = 0; l < o.length; l += 1)
				for (var d = o[l], h = 0; h < this.length; h += 1) {
					var p = this[h],
						c = void 0;
					if (!a && p.dom7Listeners ? c = p.dom7Listeners[d] : a && p.dom7LiveListeners && (c = p.dom7LiveListeners[d]), c && c.length)
						for (var u = c.length - 1; u >= 0; u -= 1) {
							var v = c[u];
							r && v.listener === r || r && v.listener && v.listener.dom7proxy && v.listener.dom7proxy === r ? (p.removeEventListener(d, v.proxyListener, n), c.splice(u, 1)) : r || (p.removeEventListener(d, v.proxyListener, n), c.splice(u, 1))
						}
				}
			return this
		},
		trigger: function () {
			for (var e = [], t = arguments.length; t--;) e[t] = arguments[t];
			for (var s = e[0].split(" "), r = e[1], n = 0; n < s.length; n += 1)
				for (var o = s[n], l = 0; l < this.length; l += 1) {
					var d = this[l],
						h = void 0;
					try {
						h = new a.CustomEvent(o, {
							detail: r,
							bubbles: !0,
							cancelable: !0
						})
					} catch (e) {
						(h = i.createEvent("Event")).initEvent(o, !0, !0), h.detail = r
					}
					d.dom7EventData = e.filter((function (e, t) {
						return t > 0
					})), d.dispatchEvent(h), d.dom7EventData = [], delete d.dom7EventData
				}
			return this
		},
		transitionEnd: function (e) {
			var t, i = ["webkitTransitionEnd", "transitionend"],
				s = this;

			function a(r) {
				if (r.target === this)
					for (e.call(this, r), t = 0; t < i.length; t += 1) s.off(i[t], a)
			}
			if (e)
				for (t = 0; t < i.length; t += 1) s.on(i[t], a);
			return this
		},
		outerWidth: function (e) {
			if (this.length > 0) {
				if (e) {
					var t = this.styles();
					return this[0].offsetWidth + parseFloat(t.getPropertyValue("margin-right")) + parseFloat(t.getPropertyValue("margin-left"))
				}
				return this[0].offsetWidth
			}
			return null
		},
		outerHeight: function (e) {
			if (this.length > 0) {
				if (e) {
					var t = this.styles();
					return this[0].offsetHeight + parseFloat(t.getPropertyValue("margin-top")) + parseFloat(t.getPropertyValue("margin-bottom"))
				}
				return this[0].offsetHeight
			}
			return null
		},
		offset: function () {
			if (this.length > 0) {
				var e = this[0],
					t = e.getBoundingClientRect(),
					s = i.body,
					r = e.clientTop || s.clientTop || 0,
					n = e.clientLeft || s.clientLeft || 0,
					o = e === a ? a.scrollY : e.scrollTop,
					l = e === a ? a.scrollX : e.scrollLeft;
				return {
					top: t.top + o - r,
					left: t.left + l - n
				}
			}
			return null
		},
		css: function (e, t) {
			var i;
			if (1 === arguments.length) {
				if ("string" != typeof e) {
					for (i = 0; i < this.length; i += 1)
						for (var s in e) this[i].style[s] = e[s];
					return this
				}
				if (this[0]) return a.getComputedStyle(this[0], null).getPropertyValue(e)
			}
			if (2 === arguments.length && "string" == typeof e) {
				for (i = 0; i < this.length; i += 1) this[i].style[e] = t;
				return this
			}
			return this
		},
		each: function (e) {
			if (!e) return this;
			for (var t = 0; t < this.length; t += 1)
				if (!1 === e.call(this[t], t, this[t])) return this;
			return this
		},
		html: function (e) {
			if (void 0 === e) return this[0] ? this[0].innerHTML : void 0;
			for (var t = 0; t < this.length; t += 1) this[t].innerHTML = e;
			return this
		},
		text: function (e) {
			if (void 0 === e) return this[0] ? this[0].textContent.trim() : null;
			for (var t = 0; t < this.length; t += 1) this[t].textContent = e;
			return this
		},
		is: function (e) {
			var t, s, o = this[0];
			if (!o || void 0 === e) return !1;
			if ("string" == typeof e) {
				if (o.matches) return o.matches(e);
				if (o.webkitMatchesSelector) return o.webkitMatchesSelector(e);
				if (o.msMatchesSelector) return o.msMatchesSelector(e);
				for (t = n(e), s = 0; s < t.length; s += 1)
					if (t[s] === o) return !0;
				return !1
			}
			if (e === i) return o === i;
			if (e === a) return o === a;
			if (e.nodeType || e instanceof r) {
				for (t = e.nodeType ? [e] : e, s = 0; s < t.length; s += 1)
					if (t[s] === o) return !0;
				return !1
			}
			return !1
		},
		index: function () {
			var e, t = this[0];
			if (t) {
				for (e = 0; null !== (t = t.previousSibling);) 1 === t.nodeType && (e += 1);
				return e
			}
		},
		eq: function (e) {
			if (void 0 === e) return this;
			var t, i = this.length;
			return new r(e > i - 1 ? [] : e < 0 ? (t = i + e) < 0 ? [] : [this[t]] : [this[e]])
		},
		append: function () {
			for (var e, t = [], s = arguments.length; s--;) t[s] = arguments[s];
			for (var a = 0; a < t.length; a += 1) {
				e = t[a];
				for (var n = 0; n < this.length; n += 1)
					if ("string" == typeof e) {
						var o = i.createElement("div");
						for (o.innerHTML = e; o.firstChild;) this[n].appendChild(o.firstChild)
					} else if (e instanceof r)
					for (var l = 0; l < e.length; l += 1) this[n].appendChild(e[l]);
				else this[n].appendChild(e)
			}
			return this
		},
		prepend: function (e) {
			var t, s;
			for (t = 0; t < this.length; t += 1)
				if ("string" == typeof e) {
					var a = i.createElement("div");
					for (a.innerHTML = e, s = a.childNodes.length - 1; s >= 0; s -= 1) this[t].insertBefore(a.childNodes[s], this[t].childNodes[0])
				} else if (e instanceof r)
				for (s = 0; s < e.length; s += 1) this[t].insertBefore(e[s], this[t].childNodes[0]);
			else this[t].insertBefore(e, this[t].childNodes[0]);
			return this
		},
		next: function (e) {
			return this.length > 0 ? e ? this[0].nextElementSibling && n(this[0].nextElementSibling).is(e) ? new r([this[0].nextElementSibling]) : new r([]) : this[0].nextElementSibling ? new r([this[0].nextElementSibling]) : new r([]) : new r([])
		},
		nextAll: function (e) {
			var t = [],
				i = this[0];
			if (!i) return new r([]);
			for (; i.nextElementSibling;) {
				var s = i.nextElementSibling;
				e ? n(s).is(e) && t.push(s) : t.push(s), i = s
			}
			return new r(t)
		},
		prev: function (e) {
			if (this.length > 0) {
				var t = this[0];
				return e ? t.previousElementSibling && n(t.previousElementSibling).is(e) ? new r([t.previousElementSibling]) : new r([]) : t.previousElementSibling ? new r([t.previousElementSibling]) : new r([])
			}
			return new r([])
		},
		prevAll: function (e) {
			var t = [],
				i = this[0];
			if (!i) return new r([]);
			for (; i.previousElementSibling;) {
				var s = i.previousElementSibling;
				e ? n(s).is(e) && t.push(s) : t.push(s), i = s
			}
			return new r(t)
		},
		parent: function (e) {
			for (var t = [], i = 0; i < this.length; i += 1) null !== this[i].parentNode && (e ? n(this[i].parentNode).is(e) && t.push(this[i].parentNode) : t.push(this[i].parentNode));
			return n(o(t))
		},
		parents: function (e) {
			for (var t = [], i = 0; i < this.length; i += 1)
				for (var s = this[i].parentNode; s;) e ? n(s).is(e) && t.push(s) : t.push(s), s = s.parentNode;
			return n(o(t))
		},
		closest: function (e) {
			var t = this;
			return void 0 === e ? new r([]) : (t.is(e) || (t = t.parents(e).eq(0)), t)
		},
		find: function (e) {
			for (var t = [], i = 0; i < this.length; i += 1)
				for (var s = this[i].querySelectorAll(e), a = 0; a < s.length; a += 1) t.push(s[a]);
			return new r(t)
		},
		children: function (e) {
			for (var t = [], i = 0; i < this.length; i += 1)
				for (var s = this[i].childNodes, a = 0; a < s.length; a += 1) e ? 1 === s[a].nodeType && n(s[a]).is(e) && t.push(s[a]) : 1 === s[a].nodeType && t.push(s[a]);
			return new r(o(t))
		},
		filter: function (e) {
			for (var t = [], i = 0; i < this.length; i += 1) e.call(this[i], i, this[i]) && t.push(this[i]);
			return new r(t)
		},
		remove: function () {
			for (var e = 0; e < this.length; e += 1) this[e].parentNode && this[e].parentNode.removeChild(this[e]);
			return this
		},
		add: function () {
			for (var e = [], t = arguments.length; t--;) e[t] = arguments[t];
			var i, s, a = this;
			for (i = 0; i < e.length; i += 1) {
				var r = n(e[i]);
				for (s = 0; s < r.length; s += 1) a[a.length] = r[s], a.length += 1
			}
			return a
		},
		styles: function () {
			return this[0] ? a.getComputedStyle(this[0], null) : {}
		}
	};
	Object.keys(l).forEach((function (e) {
		n.fn[e] = n.fn[e] || l[e]
	}));
	var d = {
			deleteProps: function (e) {
				var t = e;
				Object.keys(t).forEach((function (e) {
					try {
						t[e] = null
					} catch (e) {}
					try {
						delete t[e]
					} catch (e) {}
				}))
			},
			nextTick: function (e, t) {
				return void 0 === t && (t = 0), setTimeout(e, t)
			},
			now: function () {
				return Date.now()
			},
			getTranslate: function (e, t) {
				var i, s, r;
				void 0 === t && (t = "x");
				var n = a.getComputedStyle(e, null);
				return a.WebKitCSSMatrix ? ((s = n.transform || n.webkitTransform).split(",").length > 6 && (s = s.split(", ").map((function (e) {
					return e.replace(",", ".")
				})).join(", ")), r = new a.WebKitCSSMatrix("none" === s ? "" : s)) : i = (r = n.MozTransform || n.OTransform || n.MsTransform || n.msTransform || n.transform || n.getPropertyValue("transform").replace("translate(", "matrix(1, 0, 0, 1,")).toString().split(","), "x" === t && (s = a.WebKitCSSMatrix ? r.m41 : 16 === i.length ? parseFloat(i[12]) : parseFloat(i[4])), "y" === t && (s = a.WebKitCSSMatrix ? r.m42 : 16 === i.length ? parseFloat(i[13]) : parseFloat(i[5])), s || 0
			},
			parseUrlQuery: function (e) {
				var t, i, s, r, n = {},
					o = e || a.location.href;
				if ("string" == typeof o && o.length)
					for (r = (i = (o = o.indexOf("?") > -1 ? o.replace(/\S*\?/, "") : "").split("&").filter((function (e) {
							return "" !== e
						}))).length, t = 0; t < r; t += 1) s = i[t].replace(/#\S+/g, "").split("="), n[decodeURIComponent(s[0])] = void 0 === s[1] ? void 0 : decodeURIComponent(s[1]) || "";
				return n
			},
			isObject: function (e) {
				return "object" == typeof e && null !== e && e.constructor && e.constructor === Object
			},
			extend: function () {
				for (var e = [], t = arguments.length; t--;) e[t] = arguments[t];
				for (var i = Object(e[0]), s = 1; s < e.length; s += 1) {
					var a = e[s];
					if (null != a)
						for (var r = Object.keys(Object(a)), n = 0, o = r.length; n < o; n += 1) {
							var l = r[n],
								h = Object.getOwnPropertyDescriptor(a, l);
							void 0 !== h && h.enumerable && (d.isObject(i[l]) && d.isObject(a[l]) ? d.extend(i[l], a[l]) : !d.isObject(i[l]) && d.isObject(a[l]) ? (i[l] = {}, d.extend(i[l], a[l])) : i[l] = a[l])
						}
				}
				return i
			}
		},
		h = {
			touch: !!("ontouchstart" in a || a.DocumentTouch && i instanceof a.DocumentTouch),
			pointerEvents: !!a.PointerEvent && "maxTouchPoints" in a.navigator && a.navigator.maxTouchPoints >= 0,
			observer: "MutationObserver" in a || "WebkitMutationObserver" in a,
			passiveListener: function () {
				var e = !1;
				try {
					var t = Object.defineProperty({}, "passive", {
						get: function () {
							e = !0
						}
					});
					a.addEventListener("testPassiveListener", null, t)
				} catch (e) {}
				return e
			}(),
			gestures: "ongesturestart" in a
		},
		p = function (e) {
			void 0 === e && (e = {});
			var t = this;
			t.params = e, t.eventsListeners = {}, t.params && t.params.on && Object.keys(t.params.on).forEach((function (e) {
				t.on(e, t.params.on[e])
			}))
		},
		c = {
			components: {
				configurable: !0
			}
		};
	p.prototype.on = function (e, t, i) {
		var s = this;
		if ("function" != typeof t) return s;
		var a = i ? "unshift" : "push";
		return e.split(" ").forEach((function (e) {
			s.eventsListeners[e] || (s.eventsListeners[e] = []), s.eventsListeners[e][a](t)
		})), s
	}, p.prototype.once = function (e, t, i) {
		var s = this;
		if ("function" != typeof t) return s;

		function a() {
			for (var i = [], r = arguments.length; r--;) i[r] = arguments[r];
			s.off(e, a), a.f7proxy && delete a.f7proxy, t.apply(s, i)
		}
		return a.f7proxy = t, s.on(e, a, i)
	}, p.prototype.off = function (e, t) {
		var i = this;
		return i.eventsListeners ? (e.split(" ").forEach((function (e) {
			void 0 === t ? i.eventsListeners[e] = [] : i.eventsListeners[e] && i.eventsListeners[e].length && i.eventsListeners[e].forEach((function (s, a) {
				(s === t || s.f7proxy && s.f7proxy === t) && i.eventsListeners[e].splice(a, 1)
			}))
		})), i) : i
	}, p.prototype.emit = function () {
		for (var e = [], t = arguments.length; t--;) e[t] = arguments[t];
		var i, s, a, r = this;
		if (!r.eventsListeners) return r;
		"string" == typeof e[0] || Array.isArray(e[0]) ? (i = e[0], s = e.slice(1, e.length), a = r) : (i = e[0].events, s = e[0].data, a = e[0].context || r);
		var n = Array.isArray(i) ? i : i.split(" ");
		return n.forEach((function (e) {
			if (r.eventsListeners && r.eventsListeners[e]) {
				var t = [];
				r.eventsListeners[e].forEach((function (e) {
					t.push(e)
				})), t.forEach((function (e) {
					e.apply(a, s)
				}))
			}
		})), r
	}, p.prototype.useModulesParams = function (e) {
		var t = this;
		t.modules && Object.keys(t.modules).forEach((function (i) {
			var s = t.modules[i];
			s.params && d.extend(e, s.params)
		}))
	}, p.prototype.useModules = function (e) {
		void 0 === e && (e = {});
		var t = this;
		t.modules && Object.keys(t.modules).forEach((function (i) {
			var s = t.modules[i],
				a = e[i] || {};
			s.instance && Object.keys(s.instance).forEach((function (e) {
				var i = s.instance[e];
				t[e] = "function" == typeof i ? i.bind(t) : i
			})), s.on && t.on && Object.keys(s.on).forEach((function (e) {
				t.on(e, s.on[e])
			})), s.create && s.create.bind(t)(a)
		}))
	}, c.components.set = function (e) {
		this.use && this.use(e)
	}, p.installModule = function (e) {
		for (var t = [], i = arguments.length - 1; i-- > 0;) t[i] = arguments[i + 1];
		var s = this;
		s.prototype.modules || (s.prototype.modules = {});
		var a = e.name || Object.keys(s.prototype.modules).length + "_" + d.now();
		return s.prototype.modules[a] = e, e.proto && Object.keys(e.proto).forEach((function (t) {
			s.prototype[t] = e.proto[t]
		})), e.static && Object.keys(e.static).forEach((function (t) {
			s[t] = e.static[t]
		})), e.install && e.install.apply(s, t), s
	}, p.use = function (e) {
		for (var t = [], i = arguments.length - 1; i-- > 0;) t[i] = arguments[i + 1];
		var s = this;
		return Array.isArray(e) ? (e.forEach((function (e) {
			return s.installModule(e)
		})), s) : s.installModule.apply(s, [e].concat(t))
	}, Object.defineProperties(p, c);
	var u = {
		updateSize: function () {
			var e, t, i = this.$el;
			e = void 0 !== this.params.width ? this.params.width : i[0].clientWidth, t = void 0 !== this.params.height ? this.params.height : i[0].clientHeight, 0 === e && this.isHorizontal() || 0 === t && this.isVertical() || (e = e - parseInt(i.css("padding-left"), 10) - parseInt(i.css("padding-right"), 10), t = t - parseInt(i.css("padding-top"), 10) - parseInt(i.css("padding-bottom"), 10), d.extend(this, {
				width: e,
				height: t,
				size: this.isHorizontal() ? e : t
			}))
		},
		updateSlides: function () {
			var e = this.params,
				t = this.$wrapperEl,
				i = this.size,
				s = this.rtlTranslate,
				r = this.wrongRTL,
				n = this.virtual && e.virtual.enabled,
				o = n ? this.virtual.slides.length : this.slides.length,
				l = t.children("." + this.params.slideClass),
				h = n ? this.virtual.slides.length : l.length,
				p = [],
				c = [],
				u = [];

			function v(t) {
				return !e.cssMode || t !== l.length - 1
			}
			var f = e.slidesOffsetBefore;
			"function" == typeof f && (f = e.slidesOffsetBefore.call(this));
			var m = e.slidesOffsetAfter;
			"function" == typeof m && (m = e.slidesOffsetAfter.call(this));
			var g = this.snapGrid.length,
				b = this.snapGrid.length,
				w = e.spaceBetween,
				y = -f,
				x = 0,
				E = 0;
			if (void 0 !== i) {
				var T, S;
				"string" == typeof w && w.indexOf("%") >= 0 && (w = parseFloat(w.replace("%", "")) / 100 * i), this.virtualSize = -w, s ? l.css({
					marginLeft: "",
					marginTop: ""
				}) : l.css({
					marginRight: "",
					marginBottom: ""
				}), e.slidesPerColumn > 1 && (T = Math.floor(h / e.slidesPerColumn) === h / this.params.slidesPerColumn ? h : Math.ceil(h / e.slidesPerColumn) * e.slidesPerColumn, "auto" !== e.slidesPerView && "row" === e.slidesPerColumnFill && (T = Math.max(T, e.slidesPerView * e.slidesPerColumn)));
				for (var C, M = e.slidesPerColumn, P = T / M, z = Math.floor(h / e.slidesPerColumn), k = 0; k < h; k += 1) {
					S = 0;
					var $ = l.eq(k);
					if (e.slidesPerColumn > 1) {
						var L = void 0,
							I = void 0,
							D = void 0;
						if ("row" === e.slidesPerColumnFill && e.slidesPerGroup > 1) {
							var O = Math.floor(k / (e.slidesPerGroup * e.slidesPerColumn)),
								A = k - e.slidesPerColumn * e.slidesPerGroup * O,
								G = 0 === O ? e.slidesPerGroup : Math.min(Math.ceil((h - O * M * e.slidesPerGroup) / M), e.slidesPerGroup);
							L = (I = A - (D = Math.floor(A / G)) * G + O * e.slidesPerGroup) + D * T / M, $.css({
								"-webkit-box-ordinal-group": L,
								"-moz-box-ordinal-group": L,
								"-ms-flex-order": L,
								"-webkit-order": L,
								order: L
							})
						} else "column" === e.slidesPerColumnFill ? (D = k - (I = Math.floor(k / M)) * M, (I > z || I === z && D === M - 1) && (D += 1) >= M && (D = 0, I += 1)) : I = k - (D = Math.floor(k / P)) * P;
						$.css("margin-" + (this.isHorizontal() ? "top" : "left"), 0 !== D && e.spaceBetween && e.spaceBetween + "px")
					}
					if ("none" !== $.css("display")) {
						if ("auto" === e.slidesPerView) {
							var H = a.getComputedStyle($[0], null),
								B = $[0].style.transform,
								N = $[0].style.webkitTransform;
							if (B && ($[0].style.transform = "none"), N && ($[0].style.webkitTransform = "none"), e.roundLengths) S = this.isHorizontal() ? $.outerWidth(!0) : $.outerHeight(!0);
							else if (this.isHorizontal()) {
								var X = parseFloat(H.getPropertyValue("width")),
									V = parseFloat(H.getPropertyValue("padding-left")),
									Y = parseFloat(H.getPropertyValue("padding-right")),
									F = parseFloat(H.getPropertyValue("margin-left")),
									W = parseFloat(H.getPropertyValue("margin-right")),
									R = H.getPropertyValue("box-sizing");
								S = R && "border-box" === R ? X + F + W : X + V + Y + F + W
							} else {
								var q = parseFloat(H.getPropertyValue("height")),
									j = parseFloat(H.getPropertyValue("padding-top")),
									K = parseFloat(H.getPropertyValue("padding-bottom")),
									U = parseFloat(H.getPropertyValue("margin-top")),
									_ = parseFloat(H.getPropertyValue("margin-bottom")),
									Z = H.getPropertyValue("box-sizing");
								S = Z && "border-box" === Z ? q + U + _ : q + j + K + U + _
							}
							B && ($[0].style.transform = B), N && ($[0].style.webkitTransform = N), e.roundLengths && (S = Math.floor(S))
						} else S = (i - (e.slidesPerView - 1) * w) / e.slidesPerView, e.roundLengths && (S = Math.floor(S)), l[k] && (this.isHorizontal() ? l[k].style.width = S + "px" : l[k].style.height = S + "px");
						l[k] && (l[k].swiperSlideSize = S), u.push(S), e.centeredSlides ? (y = y + S / 2 + x / 2 + w, 0 === x && 0 !== k && (y = y - i / 2 - w), 0 === k && (y = y - i / 2 - w), Math.abs(y) < .001 && (y = 0), e.roundLengths && (y = Math.floor(y)), E % e.slidesPerGroup == 0 && p.push(y), c.push(y)) : (e.roundLengths && (y = Math.floor(y)), (E - Math.min(this.params.slidesPerGroupSkip, E)) % this.params.slidesPerGroup == 0 && p.push(y), c.push(y), y = y + S + w), this.virtualSize += S + w, x = S, E += 1
					}
				}
				if (this.virtualSize = Math.max(this.virtualSize, i) + m, s && r && ("slide" === e.effect || "coverflow" === e.effect) && t.css({
						width: this.virtualSize + e.spaceBetween + "px"
					}), e.setWrapperSize && (this.isHorizontal() ? t.css({
						width: this.virtualSize + e.spaceBetween + "px"
					}) : t.css({
						height: this.virtualSize + e.spaceBetween + "px"
					})), e.slidesPerColumn > 1 && (this.virtualSize = (S + e.spaceBetween) * T, this.virtualSize = Math.ceil(this.virtualSize / e.slidesPerColumn) - e.spaceBetween, this.isHorizontal() ? t.css({
						width: this.virtualSize + e.spaceBetween + "px"
					}) : t.css({
						height: this.virtualSize + e.spaceBetween + "px"
					}), e.centeredSlides)) {
					C = [];
					for (var Q = 0; Q < p.length; Q += 1) {
						var J = p[Q];
						e.roundLengths && (J = Math.floor(J)), p[Q] < this.virtualSize + p[0] && C.push(J)
					}
					p = C
				}
				if (!e.centeredSlides) {
					C = [];
					for (var ee = 0; ee < p.length; ee += 1) {
						var te = p[ee];
						e.roundLengths && (te = Math.floor(te)), p[ee] <= this.virtualSize - i && C.push(te)
					}
					p = C, Math.floor(this.virtualSize - i) - Math.floor(p[p.length - 1]) > 1 && p.push(this.virtualSize - i)
				}
				if (0 === p.length && (p = [0]), 0 !== e.spaceBetween && (this.isHorizontal() ? s ? l.filter(v).css({
						marginLeft: w + "px"
					}) : l.filter(v).css({
						marginRight: w + "px"
					}) : l.filter(v).css({
						marginBottom: w + "px"
					})), e.centeredSlides && e.centeredSlidesBounds) {
					var ie = 0;
					u.forEach((function (t) {
						ie += t + (e.spaceBetween ? e.spaceBetween : 0)
					}));
					var se = (ie -= e.spaceBetween) - i;
					p = p.map((function (e) {
						return e < 0 ? -f : e > se ? se + m : e
					}))
				}
				if (e.centerInsufficientSlides) {
					var ae = 0;
					if (u.forEach((function (t) {
							ae += t + (e.spaceBetween ? e.spaceBetween : 0)
						})), (ae -= e.spaceBetween) < i) {
						var re = (i - ae) / 2;
						p.forEach((function (e, t) {
							p[t] = e - re
						})), c.forEach((function (e, t) {
							c[t] = e + re
						}))
					}
				}
				d.extend(this, {
					slides: l,
					snapGrid: p,
					slidesGrid: c,
					slidesSizesGrid: u
				}), h !== o && this.emit("slidesLengthChange"), p.length !== g && (this.params.watchOverflow && this.checkOverflow(), this.emit("snapGridLengthChange")), c.length !== b && this.emit("slidesGridLengthChange"), (e.watchSlidesProgress || e.watchSlidesVisibility) && this.updateSlidesOffset()
			}
		},
		updateAutoHeight: function (e) {
			var t, i = [],
				s = 0;
			if ("number" == typeof e ? this.setTransition(e) : !0 === e && this.setTransition(this.params.speed), "auto" !== this.params.slidesPerView && this.params.slidesPerView > 1)
				if (this.params.centeredSlides) this.visibleSlides.each((function (e, t) {
					i.push(t)
				}));
				else
					for (t = 0; t < Math.ceil(this.params.slidesPerView); t += 1) {
						var a = this.activeIndex + t;
						if (a > this.slides.length) break;
						i.push(this.slides.eq(a)[0])
					} else i.push(this.slides.eq(this.activeIndex)[0]);
			for (t = 0; t < i.length; t += 1)
				if (void 0 !== i[t]) {
					var r = i[t].offsetHeight;
					s = r > s ? r : s
				}
			s && this.$wrapperEl.css("height", s + "px")
		},
		updateSlidesOffset: function () {
			for (var e = this.slides, t = 0; t < e.length; t += 1) e[t].swiperSlideOffset = this.isHorizontal() ? e[t].offsetLeft : e[t].offsetTop
		},
		updateSlidesProgress: function (e) {
			void 0 === e && (e = this && this.translate || 0);
			var t = this.params,
				i = this.slides,
				s = this.rtlTranslate;
			if (0 !== i.length) {
				void 0 === i[0].swiperSlideOffset && this.updateSlidesOffset();
				var a = -e;
				s && (a = e), i.removeClass(t.slideVisibleClass), this.visibleSlidesIndexes = [], this.visibleSlides = [];
				for (var r = 0; r < i.length; r += 1) {
					var o = i[r],
						l = (a + (t.centeredSlides ? this.minTranslate() : 0) - o.swiperSlideOffset) / (o.swiperSlideSize + t.spaceBetween);
					if (t.watchSlidesVisibility || t.centeredSlides && t.autoHeight) {
						var d = -(a - o.swiperSlideOffset),
							h = d + this.slidesSizesGrid[r];
						(d >= 0 && d < this.size - 1 || h > 1 && h <= this.size || d <= 0 && h >= this.size) && (this.visibleSlides.push(o), this.visibleSlidesIndexes.push(r), i.eq(r).addClass(t.slideVisibleClass))
					}
					o.progress = s ? -l : l
				}
				this.visibleSlides = n(this.visibleSlides)
			}
		},
		updateProgress: function (e) {
			if (void 0 === e) {
				var t = this.rtlTranslate ? -1 : 1;
				e = this && this.translate && this.translate * t || 0
			}
			var i = this.params,
				s = this.maxTranslate() - this.minTranslate(),
				a = this.progress,
				r = this.isBeginning,
				n = this.isEnd,
				o = r,
				l = n;
			0 === s ? (a = 0, r = !0, n = !0) : (r = (a = (e - this.minTranslate()) / s) <= 0, n = a >= 1), d.extend(this, {
				progress: a,
				isBeginning: r,
				isEnd: n
			}), (i.watchSlidesProgress || i.watchSlidesVisibility || i.centeredSlides && i.autoHeight) && this.updateSlidesProgress(e), r && !o && this.emit("reachBeginning toEdge"), n && !l && this.emit("reachEnd toEdge"), (o && !r || l && !n) && this.emit("fromEdge"), this.emit("progress", a)
		},
		updateSlidesClasses: function () {
			var e, t = this.slides,
				i = this.params,
				s = this.$wrapperEl,
				a = this.activeIndex,
				r = this.realIndex,
				n = this.virtual && i.virtual.enabled;
			t.removeClass(i.slideActiveClass + " " + i.slideNextClass + " " + i.slidePrevClass + " " + i.slideDuplicateActiveClass + " " + i.slideDuplicateNextClass + " " + i.slideDuplicatePrevClass), (e = n ? this.$wrapperEl.find("." + i.slideClass + '[data-swiper-slide-index="' + a + '"]') : t.eq(a)).addClass(i.slideActiveClass), i.loop && (e.hasClass(i.slideDuplicateClass) ? s.children("." + i.slideClass + ":not(." + i.slideDuplicateClass + ')[data-swiper-slide-index="' + r + '"]').addClass(i.slideDuplicateActiveClass) : s.children("." + i.slideClass + "." + i.slideDuplicateClass + '[data-swiper-slide-index="' + r + '"]').addClass(i.slideDuplicateActiveClass));
			var o = e.nextAll("." + i.slideClass).eq(0).addClass(i.slideNextClass);
			i.loop && 0 === o.length && (o = t.eq(0)).addClass(i.slideNextClass);
			var l = e.prevAll("." + i.slideClass).eq(0).addClass(i.slidePrevClass);
			i.loop && 0 === l.length && (l = t.eq(-1)).addClass(i.slidePrevClass), i.loop && (o.hasClass(i.slideDuplicateClass) ? s.children("." + i.slideClass + ":not(." + i.slideDuplicateClass + ')[data-swiper-slide-index="' + o.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicateNextClass) : s.children("." + i.slideClass + "." + i.slideDuplicateClass + '[data-swiper-slide-index="' + o.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicateNextClass), l.hasClass(i.slideDuplicateClass) ? s.children("." + i.slideClass + ":not(." + i.slideDuplicateClass + ')[data-swiper-slide-index="' + l.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicatePrevClass) : s.children("." + i.slideClass + "." + i.slideDuplicateClass + '[data-swiper-slide-index="' + l.attr("data-swiper-slide-index") + '"]').addClass(i.slideDuplicatePrevClass))
		},
		updateActiveIndex: function (e) {
			var t, i = this.rtlTranslate ? this.translate : -this.translate,
				s = this.slidesGrid,
				a = this.snapGrid,
				r = this.params,
				n = this.activeIndex,
				o = this.realIndex,
				l = this.snapIndex,
				h = e;
			if (void 0 === h) {
				for (var p = 0; p < s.length; p += 1) void 0 !== s[p + 1] ? i >= s[p] && i < s[p + 1] - (s[p + 1] - s[p]) / 2 ? h = p : i >= s[p] && i < s[p + 1] && (h = p + 1) : i >= s[p] && (h = p);
				r.normalizeSlideIndex && (h < 0 || void 0 === h) && (h = 0)
			}
			if (a.indexOf(i) >= 0) t = a.indexOf(i);
			else {
				var c = Math.min(r.slidesPerGroupSkip, h);
				t = c + Math.floor((h - c) / r.slidesPerGroup)
			}
			if (t >= a.length && (t = a.length - 1), h !== n) {
				var u = parseInt(this.slides.eq(h).attr("data-swiper-slide-index") || h, 10);
				d.extend(this, {
					snapIndex: t,
					realIndex: u,
					previousIndex: n,
					activeIndex: h
				}), this.emit("activeIndexChange"), this.emit("snapIndexChange"), o !== u && this.emit("realIndexChange"), (this.initialized || this.params.runCallbacksOnInit) && this.emit("slideChange")
			} else t !== l && (this.snapIndex = t, this.emit("snapIndexChange"))
		},
		updateClickedSlide: function (e) {
			var t = this.params,
				i = n(e.target).closest("." + t.slideClass)[0],
				s = !1;
			if (i)
				for (var a = 0; a < this.slides.length; a += 1) this.slides[a] === i && (s = !0);
			if (!i || !s) return this.clickedSlide = void 0, void(this.clickedIndex = void 0);
			this.clickedSlide = i, this.virtual && this.params.virtual.enabled ? this.clickedIndex = parseInt(n(i).attr("data-swiper-slide-index"), 10) : this.clickedIndex = n(i).index(), t.slideToClickedSlide && void 0 !== this.clickedIndex && this.clickedIndex !== this.activeIndex && this.slideToClickedSlide()
		}
	};
	var v = {
		getTranslate: function (e) {
			void 0 === e && (e = this.isHorizontal() ? "x" : "y");
			var t = this.params,
				i = this.rtlTranslate,
				s = this.translate,
				a = this.$wrapperEl;
			if (t.virtualTranslate) return i ? -s : s;
			if (t.cssMode) return s;
			var r = d.getTranslate(a[0], e);
			return i && (r = -r), r || 0
		},
		setTranslate: function (e, t) {
			var i = this.rtlTranslate,
				s = this.params,
				a = this.$wrapperEl,
				r = this.wrapperEl,
				n = this.progress,
				o = 0,
				l = 0;
			this.isHorizontal() ? o = i ? -e : e : l = e, s.roundLengths && (o = Math.floor(o), l = Math.floor(l)), s.cssMode ? r[this.isHorizontal() ? "scrollLeft" : "scrollTop"] = this.isHorizontal() ? -o : -l : s.virtualTranslate || a.transform("translate3d(" + o + "px, " + l + "px, 0px)"), this.previousTranslate = this.translate, this.translate = this.isHorizontal() ? o : l;
			var d = this.maxTranslate() - this.minTranslate();
			(0 === d ? 0 : (e - this.minTranslate()) / d) !== n && this.updateProgress(e), this.emit("setTranslate", this.translate, t)
		},
		minTranslate: function () {
			return -this.snapGrid[0]
		},
		maxTranslate: function () {
			return -this.snapGrid[this.snapGrid.length - 1]
		},
		translateTo: function (e, t, i, s, a) {
			var r;
			void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0), void 0 === s && (s = !0);
			var n = this,
				o = n.params,
				l = n.wrapperEl;
			if (n.animating && o.preventInteractionOnTransition) return !1;
			var d, h = n.minTranslate(),
				p = n.maxTranslate();
			if (d = s && e > h ? h : s && e < p ? p : e, n.updateProgress(d), o.cssMode) {
				var c = n.isHorizontal();
				return 0 === t ? l[c ? "scrollLeft" : "scrollTop"] = -d : l.scrollTo ? l.scrollTo(((r = {})[c ? "left" : "top"] = -d, r.behavior = "smooth", r)) : l[c ? "scrollLeft" : "scrollTop"] = -d, !0
			}
			return 0 === t ? (n.setTransition(0), n.setTranslate(d), i && (n.emit("beforeTransitionStart", t, a), n.emit("transitionEnd"))) : (n.setTransition(t), n.setTranslate(d), i && (n.emit("beforeTransitionStart", t, a), n.emit("transitionStart")), n.animating || (n.animating = !0, n.onTranslateToWrapperTransitionEnd || (n.onTranslateToWrapperTransitionEnd = function (e) {
				n && !n.destroyed && e.target === this && (n.$wrapperEl[0].removeEventListener("transitionend", n.onTranslateToWrapperTransitionEnd), n.$wrapperEl[0].removeEventListener("webkitTransitionEnd", n.onTranslateToWrapperTransitionEnd), n.onTranslateToWrapperTransitionEnd = null, delete n.onTranslateToWrapperTransitionEnd, i && n.emit("transitionEnd"))
			}), n.$wrapperEl[0].addEventListener("transitionend", n.onTranslateToWrapperTransitionEnd), n.$wrapperEl[0].addEventListener("webkitTransitionEnd", n.onTranslateToWrapperTransitionEnd))), !0
		}
	};
	var f = {
		setTransition: function (e, t) {
			this.params.cssMode || this.$wrapperEl.transition(e), this.emit("setTransition", e, t)
		},
		transitionStart: function (e, t) {
			void 0 === e && (e = !0);
			var i = this.activeIndex,
				s = this.params,
				a = this.previousIndex;
			if (!s.cssMode) {
				s.autoHeight && this.updateAutoHeight();
				var r = t;
				if (r || (r = i > a ? "next" : i < a ? "prev" : "reset"), this.emit("transitionStart"), e && i !== a) {
					if ("reset" === r) return void this.emit("slideResetTransitionStart");
					this.emit("slideChangeTransitionStart"), "next" === r ? this.emit("slideNextTransitionStart") : this.emit("slidePrevTransitionStart")
				}
			}
		},
		transitionEnd: function (e, t) {
			void 0 === e && (e = !0);
			var i = this.activeIndex,
				s = this.previousIndex,
				a = this.params;
			if (this.animating = !1, !a.cssMode) {
				this.setTransition(0);
				var r = t;
				if (r || (r = i > s ? "next" : i < s ? "prev" : "reset"), this.emit("transitionEnd"), e && i !== s) {
					if ("reset" === r) return void this.emit("slideResetTransitionEnd");
					this.emit("slideChangeTransitionEnd"), "next" === r ? this.emit("slideNextTransitionEnd") : this.emit("slidePrevTransitionEnd")
				}
			}
		}
	};
	var m = {
		slideTo: function (e, t, i, s) {
			var a;
			void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0);
			var r = this,
				n = e;
			n < 0 && (n = 0);
			var o = r.params,
				l = r.snapGrid,
				d = r.slidesGrid,
				h = r.previousIndex,
				p = r.activeIndex,
				c = r.rtlTranslate,
				u = r.wrapperEl;
			if (r.animating && o.preventInteractionOnTransition) return !1;
			var v = Math.min(r.params.slidesPerGroupSkip, n),
				f = v + Math.floor((n - v) / r.params.slidesPerGroup);
			f >= l.length && (f = l.length - 1), (p || o.initialSlide || 0) === (h || 0) && i && r.emit("beforeSlideChangeStart");
			var m, g = -l[f];
			if (r.updateProgress(g), o.normalizeSlideIndex)
				for (var b = 0; b < d.length; b += 1) - Math.floor(100 * g) >= Math.floor(100 * d[b]) && (n = b);
			if (r.initialized && n !== p) {
				if (!r.allowSlideNext && g < r.translate && g < r.minTranslate()) return !1;
				if (!r.allowSlidePrev && g > r.translate && g > r.maxTranslate() && (p || 0) !== n) return !1
			}
			if (m = n > p ? "next" : n < p ? "prev" : "reset", c && -g === r.translate || !c && g === r.translate) return r.updateActiveIndex(n), o.autoHeight && r.updateAutoHeight(), r.updateSlidesClasses(), "slide" !== o.effect && r.setTranslate(g), "reset" !== m && (r.transitionStart(i, m), r.transitionEnd(i, m)), !1;
			if (o.cssMode) {
				var w = r.isHorizontal(),
					y = -g;
				return c && (y = u.scrollWidth - u.offsetWidth - y), 0 === t ? u[w ? "scrollLeft" : "scrollTop"] = y : u.scrollTo ? u.scrollTo(((a = {})[w ? "left" : "top"] = y, a.behavior = "smooth", a)) : u[w ? "scrollLeft" : "scrollTop"] = y, !0
			}
			return 0 === t ? (r.setTransition(0), r.setTranslate(g), r.updateActiveIndex(n), r.updateSlidesClasses(), r.emit("beforeTransitionStart", t, s), r.transitionStart(i, m), r.transitionEnd(i, m)) : (r.setTransition(t), r.setTranslate(g), r.updateActiveIndex(n), r.updateSlidesClasses(), r.emit("beforeTransitionStart", t, s), r.transitionStart(i, m), r.animating || (r.animating = !0, r.onSlideToWrapperTransitionEnd || (r.onSlideToWrapperTransitionEnd = function (e) {
				r && !r.destroyed && e.target === this && (r.$wrapperEl[0].removeEventListener("transitionend", r.onSlideToWrapperTransitionEnd), r.$wrapperEl[0].removeEventListener("webkitTransitionEnd", r.onSlideToWrapperTransitionEnd), r.onSlideToWrapperTransitionEnd = null, delete r.onSlideToWrapperTransitionEnd, r.transitionEnd(i, m))
			}), r.$wrapperEl[0].addEventListener("transitionend", r.onSlideToWrapperTransitionEnd), r.$wrapperEl[0].addEventListener("webkitTransitionEnd", r.onSlideToWrapperTransitionEnd))), !0
		},
		slideToLoop: function (e, t, i, s) {
			void 0 === e && (e = 0), void 0 === t && (t = this.params.speed), void 0 === i && (i = !0);
			var a = e;
			return this.params.loop && (a += this.loopedSlides), this.slideTo(a, t, i, s)
		},
		slideNext: function (e, t, i) {
			void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
			var s = this.params,
				a = this.animating,
				r = this.activeIndex < s.slidesPerGroupSkip ? 1 : s.slidesPerGroup;
			if (s.loop) {
				if (a) return !1;
				this.loopFix(), this._clientLeft = this.$wrapperEl[0].clientLeft
			}
			return this.slideTo(this.activeIndex + r, e, t, i)
		},
		slidePrev: function (e, t, i) {
			void 0 === e && (e = this.params.speed), void 0 === t && (t = !0);
			var s = this.params,
				a = this.animating,
				r = this.snapGrid,
				n = this.slidesGrid,
				o = this.rtlTranslate;
			if (s.loop) {
				if (a) return !1;
				this.loopFix(), this._clientLeft = this.$wrapperEl[0].clientLeft
			}

			function l(e) {
				return e < 0 ? -Math.floor(Math.abs(e)) : Math.floor(e)
			}
			var d, h = l(o ? this.translate : -this.translate),
				p = r.map((function (e) {
					return l(e)
				})),
				c = (n.map((function (e) {
					return l(e)
				})), r[p.indexOf(h)], r[p.indexOf(h) - 1]);
			return void 0 === c && s.cssMode && r.forEach((function (e) {
				!c && h >= e && (c = e)
			})), void 0 !== c && (d = n.indexOf(c)) < 0 && (d = this.activeIndex - 1), this.slideTo(d, e, t, i)
		},
		slideReset: function (e, t, i) {
			return void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), this.slideTo(this.activeIndex, e, t, i)
		},
		slideToClosest: function (e, t, i, s) {
			void 0 === e && (e = this.params.speed), void 0 === t && (t = !0), void 0 === s && (s = .5);
			var a = this.activeIndex,
				r = Math.min(this.params.slidesPerGroupSkip, a),
				n = r + Math.floor((a - r) / this.params.slidesPerGroup),
				o = this.rtlTranslate ? this.translate : -this.translate;
			if (o >= this.snapGrid[n]) {
				var l = this.snapGrid[n];
				o - l > (this.snapGrid[n + 1] - l) * s && (a += this.params.slidesPerGroup)
			} else {
				var d = this.snapGrid[n - 1];
				o - d <= (this.snapGrid[n] - d) * s && (a -= this.params.slidesPerGroup)
			}
			return a = Math.max(a, 0), a = Math.min(a, this.slidesGrid.length - 1), this.slideTo(a, e, t, i)
		},
		slideToClickedSlide: function () {
			var e, t = this,
				i = t.params,
				s = t.$wrapperEl,
				a = "auto" === i.slidesPerView ? t.slidesPerViewDynamic() : i.slidesPerView,
				r = t.clickedIndex;
			if (i.loop) {
				if (t.animating) return;
				e = parseInt(n(t.clickedSlide).attr("data-swiper-slide-index"), 10), i.centeredSlides ? r < t.loopedSlides - a / 2 || r > t.slides.length - t.loopedSlides + a / 2 ? (t.loopFix(), r = s.children("." + i.slideClass + '[data-swiper-slide-index="' + e + '"]:not(.' + i.slideDuplicateClass + ")").eq(0).index(), d.nextTick((function () {
					t.slideTo(r)
				}))) : t.slideTo(r) : r > t.slides.length - a ? (t.loopFix(), r = s.children("." + i.slideClass + '[data-swiper-slide-index="' + e + '"]:not(.' + i.slideDuplicateClass + ")").eq(0).index(), d.nextTick((function () {
					t.slideTo(r)
				}))) : t.slideTo(r)
			} else t.slideTo(r)
		}
	};
	var g = {
		loopCreate: function () {
			var e = this,
				t = e.params,
				s = e.$wrapperEl;
			s.children("." + t.slideClass + "." + t.slideDuplicateClass).remove();
			var a = s.children("." + t.slideClass);
			if (t.loopFillGroupWithBlank) {
				var r = t.slidesPerGroup - a.length % t.slidesPerGroup;
				if (r !== t.slidesPerGroup) {
					for (var o = 0; o < r; o += 1) {
						var l = n(i.createElement("div")).addClass(t.slideClass + " " + t.slideBlankClass);
						s.append(l)
					}
					a = s.children("." + t.slideClass)
				}
			}
			"auto" !== t.slidesPerView || t.loopedSlides || (t.loopedSlides = a.length), e.loopedSlides = Math.ceil(parseFloat(t.loopedSlides || t.slidesPerView, 10)), e.loopedSlides += t.loopAdditionalSlides, e.loopedSlides > a.length && (e.loopedSlides = a.length);
			var d = [],
				h = [];
			a.each((function (t, i) {
				var s = n(i);
				t < e.loopedSlides && h.push(i), t < a.length && t >= a.length - e.loopedSlides && d.push(i), s.attr("data-swiper-slide-index", t)
			}));
			for (var p = 0; p < h.length; p += 1) s.append(n(h[p].cloneNode(!0)).addClass(t.slideDuplicateClass));
			for (var c = d.length - 1; c >= 0; c -= 1) s.prepend(n(d[c].cloneNode(!0)).addClass(t.slideDuplicateClass))
		},
		loopFix: function () {
			this.emit("beforeLoopFix");
			var e, t = this.activeIndex,
				i = this.slides,
				s = this.loopedSlides,
				a = this.allowSlidePrev,
				r = this.allowSlideNext,
				n = this.snapGrid,
				o = this.rtlTranslate;
			this.allowSlidePrev = !0, this.allowSlideNext = !0;
			var l = -n[t] - this.getTranslate();
			if (t < s) e = i.length - 3 * s + t, e += s, this.slideTo(e, 0, !1, !0) && 0 !== l && this.setTranslate((o ? -this.translate : this.translate) - l);
			else if (t >= i.length - s) {
				e = -i.length + t + s, e += s, this.slideTo(e, 0, !1, !0) && 0 !== l && this.setTranslate((o ? -this.translate : this.translate) - l)
			}
			this.allowSlidePrev = a, this.allowSlideNext = r, this.emit("loopFix")
		},
		loopDestroy: function () {
			var e = this.$wrapperEl,
				t = this.params,
				i = this.slides;
			e.children("." + t.slideClass + "." + t.slideDuplicateClass + ",." + t.slideClass + "." + t.slideBlankClass).remove(), i.removeAttr("data-swiper-slide-index")
		}
	};
	var b = {
		setGrabCursor: function (e) {
			if (!(h.touch || !this.params.simulateTouch || this.params.watchOverflow && this.isLocked || this.params.cssMode)) {
				var t = this.el;
				t.style.cursor = "move", t.style.cursor = e ? "-webkit-grabbing" : "-webkit-grab", t.style.cursor = e ? "-moz-grabbin" : "-moz-grab", t.style.cursor = e ? "grabbing" : "grab"
			}
		},
		unsetGrabCursor: function () {
			h.touch || this.params.watchOverflow && this.isLocked || this.params.cssMode || (this.el.style.cursor = "")
		}
	};
	var w, y, x, E, T, S, C, M, P, z, k, $, L, I, D, O = {
			appendSlide: function (e) {
				var t = this.$wrapperEl,
					i = this.params;
				if (i.loop && this.loopDestroy(), "object" == typeof e && "length" in e)
					for (var s = 0; s < e.length; s += 1) e[s] && t.append(e[s]);
				else t.append(e);
				i.loop && this.loopCreate(), i.observer && h.observer || this.update()
			},
			prependSlide: function (e) {
				var t = this.params,
					i = this.$wrapperEl,
					s = this.activeIndex;
				t.loop && this.loopDestroy();
				var a = s + 1;
				if ("object" == typeof e && "length" in e) {
					for (var r = 0; r < e.length; r += 1) e[r] && i.prepend(e[r]);
					a = s + e.length
				} else i.prepend(e);
				t.loop && this.loopCreate(), t.observer && h.observer || this.update(), this.slideTo(a, 0, !1)
			},
			addSlide: function (e, t) {
				var i = this.$wrapperEl,
					s = this.params,
					a = this.activeIndex;
				s.loop && (a -= this.loopedSlides, this.loopDestroy(), this.slides = i.children("." + s.slideClass));
				var r = this.slides.length;
				if (e <= 0) this.prependSlide(t);
				else if (e >= r) this.appendSlide(t);
				else {
					for (var n = a > e ? a + 1 : a, o = [], l = r - 1; l >= e; l -= 1) {
						var d = this.slides.eq(l);
						d.remove(), o.unshift(d)
					}
					if ("object" == typeof t && "length" in t) {
						for (var p = 0; p < t.length; p += 1) t[p] && i.append(t[p]);
						n = a > e ? a + t.length : a
					} else i.append(t);
					for (var c = 0; c < o.length; c += 1) i.append(o[c]);
					s.loop && this.loopCreate(), s.observer && h.observer || this.update(), s.loop ? this.slideTo(n + this.loopedSlides, 0, !1) : this.slideTo(n, 0, !1)
				}
			},
			removeSlide: function (e) {
				var t = this.params,
					i = this.$wrapperEl,
					s = this.activeIndex;
				t.loop && (s -= this.loopedSlides, this.loopDestroy(), this.slides = i.children("." + t.slideClass));
				var a, r = s;
				if ("object" == typeof e && "length" in e) {
					for (var n = 0; n < e.length; n += 1) a = e[n], this.slides[a] && this.slides.eq(a).remove(), a < r && (r -= 1);
					r = Math.max(r, 0)
				} else a = e, this.slides[a] && this.slides.eq(a).remove(), a < r && (r -= 1), r = Math.max(r, 0);
				t.loop && this.loopCreate(), t.observer && h.observer || this.update(), t.loop ? this.slideTo(r + this.loopedSlides, 0, !1) : this.slideTo(r, 0, !1)
			},
			removeAllSlides: function () {
				for (var e = [], t = 0; t < this.slides.length; t += 1) e.push(t);
				this.removeSlide(e)
			}
		},
		A = (w = a.navigator.platform, y = a.navigator.userAgent, x = {
			ios: !1,
			android: !1,
			androidChrome: !1,
			desktop: !1,
			iphone: !1,
			ipod: !1,
			ipad: !1,
			edge: !1,
			ie: !1,
			firefox: !1,
			macos: !1,
			windows: !1,
			cordova: !(!a.cordova && !a.phonegap),
			phonegap: !(!a.cordova && !a.phonegap),
			electron: !1
		}, E = a.screen.width, T = a.screen.height, S = y.match(/(Android);?[\s\/]+([\d.]+)?/), C = y.match(/(iPad).*OS\s([\d_]+)/), M = y.match(/(iPod)(.*OS\s([\d_]+))?/), P = !C && y.match(/(iPhone\sOS|iOS)\s([\d_]+)/), z = y.indexOf("MSIE ") >= 0 || y.indexOf("Trident/") >= 0, k = y.indexOf("Edge/") >= 0, $ = y.indexOf("Gecko/") >= 0 && y.indexOf("Firefox/") >= 0, L = "Win32" === w, I = y.toLowerCase().indexOf("electron") >= 0, D = "MacIntel" === w, !C && D && h.touch && (1024 === E && 1366 === T || 834 === E && 1194 === T || 834 === E && 1112 === T || 768 === E && 1024 === T) && (C = y.match(/(Version)\/([\d.]+)/), D = !1), x.ie = z, x.edge = k, x.firefox = $, S && !L && (x.os = "android", x.osVersion = S[2], x.android = !0, x.androidChrome = y.toLowerCase().indexOf("chrome") >= 0), (C || P || M) && (x.os = "ios", x.ios = !0), P && !M && (x.osVersion = P[2].replace(/_/g, "."), x.iphone = !0), C && (x.osVersion = C[2].replace(/_/g, "."), x.ipad = !0), M && (x.osVersion = M[3] ? M[3].replace(/_/g, ".") : null, x.ipod = !0), x.ios && x.osVersion && y.indexOf("Version/") >= 0 && "10" === x.osVersion.split(".")[0] && (x.osVersion = y.toLowerCase().split("version/")[1].split(" ")[0]), x.webView = !(!(P || C || M) || !y.match(/.*AppleWebKit(?!.*Safari)/i) && !a.navigator.standalone) || a.matchMedia && a.matchMedia("(display-mode: standalone)").matches, x.webview = x.webView, x.standalone = x.webView, x.desktop = !(x.ios || x.android) || I, x.desktop && (x.electron = I, x.macos = D, x.windows = L, x.macos && (x.os = "macos"), x.windows && (x.os = "windows")), x.pixelRatio = a.devicePixelRatio || 1, x);

	function G(e) {
		var t = this.touchEventsData,
			s = this.params,
			r = this.touches;
		if (!this.animating || !s.preventInteractionOnTransition) {
			var o = e;
			o.originalEvent && (o = o.originalEvent);
			var l = n(o.target);
			if (("wrapper" !== s.touchEventsTarget || l.closest(this.wrapperEl).length) && (t.isTouchEvent = "touchstart" === o.type, (t.isTouchEvent || !("which" in o) || 3 !== o.which) && !(!t.isTouchEvent && "button" in o && o.button > 0 || t.isTouched && t.isMoved)))
				if (s.noSwiping && l.closest(s.noSwipingSelector ? s.noSwipingSelector : "." + s.noSwipingClass)[0]) this.allowClick = !0;
				else if (!s.swipeHandler || l.closest(s.swipeHandler)[0]) {
				r.currentX = "touchstart" === o.type ? o.targetTouches[0].pageX : o.pageX, r.currentY = "touchstart" === o.type ? o.targetTouches[0].pageY : o.pageY;
				var h = r.currentX,
					p = r.currentY,
					c = s.edgeSwipeDetection || s.iOSEdgeSwipeDetection,
					u = s.edgeSwipeThreshold || s.iOSEdgeSwipeThreshold;
				if (!c || !(h <= u || h >= a.screen.width - u)) {
					if (d.extend(t, {
							isTouched: !0,
							isMoved: !1,
							allowTouchCallbacks: !0,
							isScrolling: void 0,
							startMoving: void 0
						}), r.startX = h, r.startY = p, t.touchStartTime = d.now(), this.allowClick = !0, this.updateSize(), this.swipeDirection = void 0, s.threshold > 0 && (t.allowThresholdMove = !1), "touchstart" !== o.type) {
						var v = !0;
						l.is(t.formElements) && (v = !1), i.activeElement && n(i.activeElement).is(t.formElements) && i.activeElement !== l[0] && i.activeElement.blur();
						var f = v && this.allowTouchMove && s.touchStartPreventDefault;
						(s.touchStartForcePreventDefault || f) && o.preventDefault()
					}
					this.emit("touchStart", o)
				}
			}
		}
	}

	function H(e) {
		var t = this.touchEventsData,
			s = this.params,
			a = this.touches,
			r = this.rtlTranslate,
			o = e;
		if (o.originalEvent && (o = o.originalEvent), t.isTouched) {
			if (!t.isTouchEvent || "touchmove" === o.type) {
				var l = "touchmove" === o.type && o.targetTouches && (o.targetTouches[0] || o.changedTouches[0]),
					h = "touchmove" === o.type ? l.pageX : o.pageX,
					p = "touchmove" === o.type ? l.pageY : o.pageY;
				if (o.preventedByNestedSwiper) return a.startX = h, void(a.startY = p);
				if (!this.allowTouchMove) return this.allowClick = !1, void(t.isTouched && (d.extend(a, {
					startX: h,
					startY: p,
					currentX: h,
					currentY: p
				}), t.touchStartTime = d.now()));
				if (t.isTouchEvent && s.touchReleaseOnEdges && !s.loop)
					if (this.isVertical()) {
						if (p < a.startY && this.translate <= this.maxTranslate() || p > a.startY && this.translate >= this.minTranslate()) return t.isTouched = !1, void(t.isMoved = !1)
					} else if (h < a.startX && this.translate <= this.maxTranslate() || h > a.startX && this.translate >= this.minTranslate()) return;
				if (t.isTouchEvent && i.activeElement && o.target === i.activeElement && n(o.target).is(t.formElements)) return t.isMoved = !0, void(this.allowClick = !1);
				if (t.allowTouchCallbacks && this.emit("touchMove", o), !(o.targetTouches && o.targetTouches.length > 1)) {
					a.currentX = h, a.currentY = p;
					var c = a.currentX - a.startX,
						u = a.currentY - a.startY;
					if (!(this.params.threshold && Math.sqrt(Math.pow(c, 2) + Math.pow(u, 2)) < this.params.threshold)) {
						var v;
						if (void 0 === t.isScrolling) this.isHorizontal() && a.currentY === a.startY || this.isVertical() && a.currentX === a.startX ? t.isScrolling = !1 : c * c + u * u >= 25 && (v = 180 * Math.atan2(Math.abs(u), Math.abs(c)) / Math.PI, t.isScrolling = this.isHorizontal() ? v > s.touchAngle : 90 - v > s.touchAngle);
						if (t.isScrolling && this.emit("touchMoveOpposite", o), void 0 === t.startMoving && (a.currentX === a.startX && a.currentY === a.startY || (t.startMoving = !0)), t.isScrolling) t.isTouched = !1;
						else if (t.startMoving) {
							this.allowClick = !1, !s.cssMode && o.cancelable && o.preventDefault(), s.touchMoveStopPropagation && !s.nested && o.stopPropagation(), t.isMoved || (s.loop && this.loopFix(), t.startTranslate = this.getTranslate(), this.setTransition(0), this.animating && this.$wrapperEl.trigger("webkitTransitionEnd transitionend"), t.allowMomentumBounce = !1, !s.grabCursor || !0 !== this.allowSlideNext && !0 !== this.allowSlidePrev || this.setGrabCursor(!0), this.emit("sliderFirstMove", o)), this.emit("sliderMove", o), t.isMoved = !0;
							var f = this.isHorizontal() ? c : u;
							a.diff = f, f *= s.touchRatio, r && (f = -f), this.swipeDirection = f > 0 ? "prev" : "next", t.currentTranslate = f + t.startTranslate;
							var m = !0,
								g = s.resistanceRatio;
							if (s.touchReleaseOnEdges && (g = 0), f > 0 && t.currentTranslate > this.minTranslate() ? (m = !1, s.resistance && (t.currentTranslate = this.minTranslate() - 1 + Math.pow(-this.minTranslate() + t.startTranslate + f, g))) : f < 0 && t.currentTranslate < this.maxTranslate() && (m = !1, s.resistance && (t.currentTranslate = this.maxTranslate() + 1 - Math.pow(this.maxTranslate() - t.startTranslate - f, g))), m && (o.preventedByNestedSwiper = !0), !this.allowSlideNext && "next" === this.swipeDirection && t.currentTranslate < t.startTranslate && (t.currentTranslate = t.startTranslate), !this.allowSlidePrev && "prev" === this.swipeDirection && t.currentTranslate > t.startTranslate && (t.currentTranslate = t.startTranslate), s.threshold > 0) {
								if (!(Math.abs(f) > s.threshold || t.allowThresholdMove)) return void(t.currentTranslate = t.startTranslate);
								if (!t.allowThresholdMove) return t.allowThresholdMove = !0, a.startX = a.currentX, a.startY = a.currentY, t.currentTranslate = t.startTranslate, void(a.diff = this.isHorizontal() ? a.currentX - a.startX : a.currentY - a.startY)
							}
							s.followFinger && !s.cssMode && ((s.freeMode || s.watchSlidesProgress || s.watchSlidesVisibility) && (this.updateActiveIndex(), this.updateSlidesClasses()), s.freeMode && (0 === t.velocities.length && t.velocities.push({
								position: a[this.isHorizontal() ? "startX" : "startY"],
								time: t.touchStartTime
							}), t.velocities.push({
								position: a[this.isHorizontal() ? "currentX" : "currentY"],
								time: d.now()
							})), this.updateProgress(t.currentTranslate), this.setTranslate(t.currentTranslate))
						}
					}
				}
			}
		} else t.startMoving && t.isScrolling && this.emit("touchMoveOpposite", o)
	}

	function B(e) {
		var t = this,
			i = t.touchEventsData,
			s = t.params,
			a = t.touches,
			r = t.rtlTranslate,
			n = t.$wrapperEl,
			o = t.slidesGrid,
			l = t.snapGrid,
			h = e;
		if (h.originalEvent && (h = h.originalEvent), i.allowTouchCallbacks && t.emit("touchEnd", h), i.allowTouchCallbacks = !1, !i.isTouched) return i.isMoved && s.grabCursor && t.setGrabCursor(!1), i.isMoved = !1, void(i.startMoving = !1);
		s.grabCursor && i.isMoved && i.isTouched && (!0 === t.allowSlideNext || !0 === t.allowSlidePrev) && t.setGrabCursor(!1);
		var p, c = d.now(),
			u = c - i.touchStartTime;
		if (t.allowClick && (t.updateClickedSlide(h), t.emit("tap click", h), u < 300 && c - i.lastClickTime < 300 && t.emit("doubleTap doubleClick", h)), i.lastClickTime = d.now(), d.nextTick((function () {
				t.destroyed || (t.allowClick = !0)
			})), !i.isTouched || !i.isMoved || !t.swipeDirection || 0 === a.diff || i.currentTranslate === i.startTranslate) return i.isTouched = !1, i.isMoved = !1, void(i.startMoving = !1);
		if (i.isTouched = !1, i.isMoved = !1, i.startMoving = !1, p = s.followFinger ? r ? t.translate : -t.translate : -i.currentTranslate, !s.cssMode)
			if (s.freeMode) {
				if (p < -t.minTranslate()) return void t.slideTo(t.activeIndex);
				if (p > -t.maxTranslate()) return void(t.slides.length < l.length ? t.slideTo(l.length - 1) : t.slideTo(t.slides.length - 1));
				if (s.freeModeMomentum) {
					if (i.velocities.length > 1) {
						var v = i.velocities.pop(),
							f = i.velocities.pop(),
							m = v.position - f.position,
							g = v.time - f.time;
						t.velocity = m / g, t.velocity /= 2, Math.abs(t.velocity) < s.freeModeMinimumVelocity && (t.velocity = 0), (g > 150 || d.now() - v.time > 300) && (t.velocity = 0)
					} else t.velocity = 0;
					t.velocity *= s.freeModeMomentumVelocityRatio, i.velocities.length = 0;
					var b = 1e3 * s.freeModeMomentumRatio,
						w = t.velocity * b,
						y = t.translate + w;
					r && (y = -y);
					var x, E, T = !1,
						S = 20 * Math.abs(t.velocity) * s.freeModeMomentumBounceRatio;
					if (y < t.maxTranslate()) s.freeModeMomentumBounce ? (y + t.maxTranslate() < -S && (y = t.maxTranslate() - S), x = t.maxTranslate(), T = !0, i.allowMomentumBounce = !0) : y = t.maxTranslate(), s.loop && s.centeredSlides && (E = !0);
					else if (y > t.minTranslate()) s.freeModeMomentumBounce ? (y - t.minTranslate() > S && (y = t.minTranslate() + S), x = t.minTranslate(), T = !0, i.allowMomentumBounce = !0) : y = t.minTranslate(), s.loop && s.centeredSlides && (E = !0);
					else if (s.freeModeSticky) {
						for (var C, M = 0; M < l.length; M += 1)
							if (l[M] > -y) {
								C = M;
								break
							}
						y = -(y = Math.abs(l[C] - y) < Math.abs(l[C - 1] - y) || "next" === t.swipeDirection ? l[C] : l[C - 1])
					}
					if (E && t.once("transitionEnd", (function () {
							t.loopFix()
						})), 0 !== t.velocity) {
						if (b = r ? Math.abs((-y - t.translate) / t.velocity) : Math.abs((y - t.translate) / t.velocity), s.freeModeSticky) {
							var P = Math.abs((r ? -y : y) - t.translate),
								z = t.slidesSizesGrid[t.activeIndex];
							b = P < z ? s.speed : P < 2 * z ? 1.5 * s.speed : 2.5 * s.speed
						}
					} else if (s.freeModeSticky) return void t.slideToClosest();
					s.freeModeMomentumBounce && T ? (t.updateProgress(x), t.setTransition(b), t.setTranslate(y), t.transitionStart(!0, t.swipeDirection), t.animating = !0, n.transitionEnd((function () {
						t && !t.destroyed && i.allowMomentumBounce && (t.emit("momentumBounce"), t.setTransition(s.speed), setTimeout((function () {
							t.setTranslate(x), n.transitionEnd((function () {
								t && !t.destroyed && t.transitionEnd()
							}))
						}), 0))
					}))) : t.velocity ? (t.updateProgress(y), t.setTransition(b), t.setTranslate(y), t.transitionStart(!0, t.swipeDirection), t.animating || (t.animating = !0, n.transitionEnd((function () {
						t && !t.destroyed && t.transitionEnd()
					})))) : t.updateProgress(y), t.updateActiveIndex(), t.updateSlidesClasses()
				} else if (s.freeModeSticky) return void t.slideToClosest();
				(!s.freeModeMomentum || u >= s.longSwipesMs) && (t.updateProgress(), t.updateActiveIndex(), t.updateSlidesClasses())
			} else {
				for (var k = 0, $ = t.slidesSizesGrid[0], L = 0; L < o.length; L += L < s.slidesPerGroupSkip ? 1 : s.slidesPerGroup) {
					var I = L < s.slidesPerGroupSkip - 1 ? 1 : s.slidesPerGroup;
					void 0 !== o[L + I] ? p >= o[L] && p < o[L + I] && (k = L, $ = o[L + I] - o[L]) : p >= o[L] && (k = L, $ = o[o.length - 1] - o[o.length - 2])
				}
				var D = (p - o[k]) / $,
					O = k < s.slidesPerGroupSkip - 1 ? 1 : s.slidesPerGroup;
				if (u > s.longSwipesMs) {
					if (!s.longSwipes) return void t.slideTo(t.activeIndex);
					"next" === t.swipeDirection && (D >= s.longSwipesRatio ? t.slideTo(k + O) : t.slideTo(k)), "prev" === t.swipeDirection && (D > 1 - s.longSwipesRatio ? t.slideTo(k + O) : t.slideTo(k))
				} else {
					if (!s.shortSwipes) return void t.slideTo(t.activeIndex);
					t.navigation && (h.target === t.navigation.nextEl || h.target === t.navigation.prevEl) ? h.target === t.navigation.nextEl ? t.slideTo(k + O) : t.slideTo(k) : ("next" === t.swipeDirection && t.slideTo(k + O), "prev" === t.swipeDirection && t.slideTo(k))
				}
			}
	}

	function N() {
		var e = this.params,
			t = this.el;
		if (!t || 0 !== t.offsetWidth) {
			e.breakpoints && this.setBreakpoint();
			var i = this.allowSlideNext,
				s = this.allowSlidePrev,
				a = this.snapGrid;
			this.allowSlideNext = !0, this.allowSlidePrev = !0, this.updateSize(), this.updateSlides(), this.updateSlidesClasses(), ("auto" === e.slidesPerView || e.slidesPerView > 1) && this.isEnd && !this.isBeginning && !this.params.centeredSlides ? this.slideTo(this.slides.length - 1, 0, !1, !0) : this.slideTo(this.activeIndex, 0, !1, !0), this.autoplay && this.autoplay.running && this.autoplay.paused && this.autoplay.run(), this.allowSlidePrev = s, this.allowSlideNext = i, this.params.watchOverflow && a !== this.snapGrid && this.checkOverflow()
		}
	}

	function X(e) {
		this.allowClick || (this.params.preventClicks && e.preventDefault(), this.params.preventClicksPropagation && this.animating && (e.stopPropagation(), e.stopImmediatePropagation()))
	}

	function V() {
		var e = this.wrapperEl,
			t = this.rtlTranslate;
		this.previousTranslate = this.translate, this.isHorizontal() ? this.translate = t ? e.scrollWidth - e.offsetWidth - e.scrollLeft : -e.scrollLeft : this.translate = -e.scrollTop, -0 === this.translate && (this.translate = 0), this.updateActiveIndex(), this.updateSlidesClasses();
		var i = this.maxTranslate() - this.minTranslate();
		(0 === i ? 0 : (this.translate - this.minTranslate()) / i) !== this.progress && this.updateProgress(t ? -this.translate : this.translate), this.emit("setTranslate", this.translate, !1)
	}
	var Y = !1;

	function F() {}
	var W = {
			init: !0,
			direction: "horizontal",
			touchEventsTarget: "container",
			initialSlide: 0,
			speed: 300,
			cssMode: !1,
			updateOnWindowResize: !0,
			preventInteractionOnTransition: !1,
			edgeSwipeDetection: !1,
			edgeSwipeThreshold: 20,
			freeMode: !1,
			freeModeMomentum: !0,
			freeModeMomentumRatio: 1,
			freeModeMomentumBounce: !0,
			freeModeMomentumBounceRatio: 1,
			freeModeMomentumVelocityRatio: 1,
			freeModeSticky: !1,
			freeModeMinimumVelocity: .02,
			autoHeight: !1,
			setWrapperSize: !1,
			virtualTranslate: !1,
			effect: "slide",
			breakpoints: void 0,
			spaceBetween: 0,
			slidesPerView: 1,
			slidesPerColumn: 1,
			slidesPerColumnFill: "column",
			slidesPerGroup: 1,
			slidesPerGroupSkip: 0,
			centeredSlides: !1,
			centeredSlidesBounds: !1,
			slidesOffsetBefore: 0,
			slidesOffsetAfter: 0,
			normalizeSlideIndex: !0,
			centerInsufficientSlides: !1,
			watchOverflow: !1,
			roundLengths: !1,
			touchRatio: 1,
			touchAngle: 45,
			simulateTouch: !0,
			shortSwipes: !0,
			longSwipes: !0,
			longSwipesRatio: .5,
			longSwipesMs: 300,
			followFinger: !0,
			allowTouchMove: !0,
			threshold: 0,
			touchMoveStopPropagation: !1,
			touchStartPreventDefault: !0,
			touchStartForcePreventDefault: !1,
			touchReleaseOnEdges: !1,
			uniqueNavElements: !0,
			resistance: !0,
			resistanceRatio: .85,
			watchSlidesProgress: !1,
			watchSlidesVisibility: !1,
			grabCursor: !1,
			preventClicks: !0,
			preventClicksPropagation: !0,
			slideToClickedSlide: !1,
			preloadImages: !0,
			updateOnImagesReady: !0,
			loop: !1,
			loopAdditionalSlides: 0,
			loopedSlides: null,
			loopFillGroupWithBlank: !1,
			allowSlidePrev: !0,
			allowSlideNext: !0,
			swipeHandler: null,
			noSwiping: !0,
			noSwipingClass: "swiper-no-swiping",
			noSwipingSelector: null,
			passiveListeners: !0,
			containerModifierClass: "swiper-container-",
			slideClass: "swiper-slide",
			slideBlankClass: "swiper-slide-invisible-blank",
			slideActiveClass: "swiper-slide-active",
			slideDuplicateActiveClass: "swiper-slide-duplicate-active",
			slideVisibleClass: "swiper-slide-visible",
			slideDuplicateClass: "swiper-slide-duplicate",
			slideNextClass: "swiper-slide-next",
			slideDuplicateNextClass: "swiper-slide-duplicate-next",
			slidePrevClass: "swiper-slide-prev",
			slideDuplicatePrevClass: "swiper-slide-duplicate-prev",
			wrapperClass: "swiper-wrapper",
			runCallbacksOnInit: !0
		},
		R = {
			update: u,
			translate: v,
			transition: f,
			slide: m,
			loop: g,
			grabCursor: b,
			manipulation: O,
			events: {
				attachEvents: function () {
					var e = this.params,
						t = this.touchEvents,
						s = this.el,
						a = this.wrapperEl;
					this.onTouchStart = G.bind(this), this.onTouchMove = H.bind(this), this.onTouchEnd = B.bind(this), e.cssMode && (this.onScroll = V.bind(this)), this.onClick = X.bind(this);
					var r = !!e.nested;
					if (!h.touch && h.pointerEvents) s.addEventListener(t.start, this.onTouchStart, !1), i.addEventListener(t.move, this.onTouchMove, r), i.addEventListener(t.end, this.onTouchEnd, !1);
					else {
						if (h.touch) {
							var n = !("touchstart" !== t.start || !h.passiveListener || !e.passiveListeners) && {
								passive: !0,
								capture: !1
							};
							s.addEventListener(t.start, this.onTouchStart, n), s.addEventListener(t.move, this.onTouchMove, h.passiveListener ? {
								passive: !1,
								capture: r
							} : r), s.addEventListener(t.end, this.onTouchEnd, n), t.cancel && s.addEventListener(t.cancel, this.onTouchEnd, n), Y || (i.addEventListener("touchstart", F), Y = !0)
						}(e.simulateTouch && !A.ios && !A.android || e.simulateTouch && !h.touch && A.ios) && (s.addEventListener("mousedown", this.onTouchStart, !1), i.addEventListener("mousemove", this.onTouchMove, r), i.addEventListener("mouseup", this.onTouchEnd, !1))
					}(e.preventClicks || e.preventClicksPropagation) && s.addEventListener("click", this.onClick, !0), e.cssMode && a.addEventListener("scroll", this.onScroll), e.updateOnWindowResize ? this.on(A.ios || A.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", N, !0) : this.on("observerUpdate", N, !0)
				},
				detachEvents: function () {
					var e = this.params,
						t = this.touchEvents,
						s = this.el,
						a = this.wrapperEl,
						r = !!e.nested;
					if (!h.touch && h.pointerEvents) s.removeEventListener(t.start, this.onTouchStart, !1), i.removeEventListener(t.move, this.onTouchMove, r), i.removeEventListener(t.end, this.onTouchEnd, !1);
					else {
						if (h.touch) {
							var n = !("onTouchStart" !== t.start || !h.passiveListener || !e.passiveListeners) && {
								passive: !0,
								capture: !1
							};
							s.removeEventListener(t.start, this.onTouchStart, n), s.removeEventListener(t.move, this.onTouchMove, r), s.removeEventListener(t.end, this.onTouchEnd, n), t.cancel && s.removeEventListener(t.cancel, this.onTouchEnd, n)
						}(e.simulateTouch && !A.ios && !A.android || e.simulateTouch && !h.touch && A.ios) && (s.removeEventListener("mousedown", this.onTouchStart, !1), i.removeEventListener("mousemove", this.onTouchMove, r), i.removeEventListener("mouseup", this.onTouchEnd, !1))
					}(e.preventClicks || e.preventClicksPropagation) && s.removeEventListener("click", this.onClick, !0), e.cssMode && a.removeEventListener("scroll", this.onScroll), this.off(A.ios || A.android ? "resize orientationchange observerUpdate" : "resize observerUpdate", N)
				}
			},
			breakpoints: {
				setBreakpoint: function () {
					var e = this.activeIndex,
						t = this.initialized,
						i = this.loopedSlides;
					void 0 === i && (i = 0);
					var s = this.params,
						a = this.$el,
						r = s.breakpoints;
					if (r && (!r || 0 !== Object.keys(r).length)) {
						var n = this.getBreakpoint(r);
						if (n && this.currentBreakpoint !== n) {
							var o = n in r ? r[n] : void 0;
							o && ["slidesPerView", "spaceBetween", "slidesPerGroup", "slidesPerGroupSkip", "slidesPerColumn"].forEach((function (e) {
								var t = o[e];
								void 0 !== t && (o[e] = "slidesPerView" !== e || "AUTO" !== t && "auto" !== t ? "slidesPerView" === e ? parseFloat(t) : parseInt(t, 10) : "auto")
							}));
							var l = o || this.originalParams,
								h = s.slidesPerColumn > 1,
								p = l.slidesPerColumn > 1;
							h && !p ? a.removeClass(s.containerModifierClass + "multirow " + s.containerModifierClass + "multirow-column") : !h && p && (a.addClass(s.containerModifierClass + "multirow"), "column" === l.slidesPerColumnFill && a.addClass(s.containerModifierClass + "multirow-column"));
							var c = l.direction && l.direction !== s.direction,
								u = s.loop && (l.slidesPerView !== s.slidesPerView || c);
							c && t && this.changeDirection(), d.extend(this.params, l), d.extend(this, {
								allowTouchMove: this.params.allowTouchMove,
								allowSlideNext: this.params.allowSlideNext,
								allowSlidePrev: this.params.allowSlidePrev
							}), this.currentBreakpoint = n, u && t && (this.loopDestroy(), this.loopCreate(), this.updateSlides(), this.slideTo(e - i + this.loopedSlides, 0, !1)), this.emit("breakpoint", l)
						}
					}
				},
				getBreakpoint: function (e) {
					if (e) {
						var t = !1,
							i = Object.keys(e).map((function (e) {
								if ("string" == typeof e && 0 === e.indexOf("@")) {
									var t = parseFloat(e.substr(1));
									return {
										value: a.innerHeight * t,
										point: e
									}
								}
								return {
									value: e,
									point: e
								}
							}));
						i.sort((function (e, t) {
							return parseInt(e.value, 10) - parseInt(t.value, 10)
						}));
						for (var s = 0; s < i.length; s += 1) {
							var r = i[s],
								n = r.point;
							r.value <= a.innerWidth && (t = n)
						}
						return t || "max"
					}
				}
			},
			checkOverflow: {
				checkOverflow: function () {
					var e = this.params,
						t = this.isLocked,
						i = this.slides.length > 0 && e.slidesOffsetBefore + e.spaceBetween * (this.slides.length - 1) + this.slides[0].offsetWidth * this.slides.length;
					e.slidesOffsetBefore && e.slidesOffsetAfter && i ? this.isLocked = i <= this.size : this.isLocked = 1 === this.snapGrid.length, this.allowSlideNext = !this.isLocked, this.allowSlidePrev = !this.isLocked, t !== this.isLocked && this.emit(this.isLocked ? "lock" : "unlock"), t && t !== this.isLocked && (this.isEnd = !1, this.navigation && this.navigation.update())
				}
			},
			classes: {
				addClasses: function () {
					var e = this.classNames,
						t = this.params,
						i = this.rtl,
						s = this.$el,
						a = [];
					a.push("initialized"), a.push(t.direction), t.freeMode && a.push("free-mode"), t.autoHeight && a.push("autoheight"), i && a.push("rtl"), t.slidesPerColumn > 1 && (a.push("multirow"), "column" === t.slidesPerColumnFill && a.push("multirow-column")), A.android && a.push("android"), A.ios && a.push("ios"), t.cssMode && a.push("css-mode"), a.forEach((function (i) {
						e.push(t.containerModifierClass + i)
					})), s.addClass(e.join(" "))
				},
				removeClasses: function () {
					var e = this.$el,
						t = this.classNames;
					e.removeClass(t.join(" "))
				}
			},
			images: {
				loadImage: function (e, t, i, s, r, o) {
					var l;

					function d() {
						o && o()
					}
					n(e).parent("picture")[0] || e.complete && r ? d() : t ? ((l = new a.Image).onload = d, l.onerror = d, s && (l.sizes = s), i && (l.srcset = i), t && (l.src = t)) : d()
				},
				preloadImages: function () {
					var e = this;

					function t() {
						null != e && e && !e.destroyed && (void 0 !== e.imagesLoaded && (e.imagesLoaded += 1), e.imagesLoaded === e.imagesToLoad.length && (e.params.updateOnImagesReady && e.update(), e.emit("imagesReady")))
					}
					e.imagesToLoad = e.$el.find("img");
					for (var i = 0; i < e.imagesToLoad.length; i += 1) {
						var s = e.imagesToLoad[i];
						e.loadImage(s, s.currentSrc || s.getAttribute("src"), s.srcset || s.getAttribute("srcset"), s.sizes || s.getAttribute("sizes"), !0, t)
					}
				}
			}
		},
		q = {},
		j = function (e) {
			function t() {
				for (var i, s, a, r = [], o = arguments.length; o--;) r[o] = arguments[o];
				1 === r.length && r[0].constructor && r[0].constructor === Object ? a = r[0] : (s = (i = r)[0], a = i[1]), a || (a = {}), a = d.extend({}, a), s && !a.el && (a.el = s), e.call(this, a), Object.keys(R).forEach((function (e) {
					Object.keys(R[e]).forEach((function (i) {
						t.prototype[i] || (t.prototype[i] = R[e][i])
					}))
				}));
				var l = this;
				void 0 === l.modules && (l.modules = {}), Object.keys(l.modules).forEach((function (e) {
					var t = l.modules[e];
					if (t.params) {
						var i = Object.keys(t.params)[0],
							s = t.params[i];
						if ("object" != typeof s || null === s) return;
						if (!(i in a) || !("enabled" in s)) return;
						!0 === a[i] && (a[i] = {
							enabled: !0
						}), "object" != typeof a[i] || "enabled" in a[i] || (a[i].enabled = !0), a[i] || (a[i] = {
							enabled: !1
						})
					}
				}));
				var p = d.extend({}, W);
				l.useModulesParams(p), l.params = d.extend({}, p, q, a), l.originalParams = d.extend({}, l.params), l.passedParams = d.extend({}, a), l.$ = n;
				var c = n(l.params.el);
				if (s = c[0]) {
					if (c.length > 1) {
						var u = [];
						return c.each((function (e, i) {
							var s = d.extend({}, a, {
								el: i
							});
							u.push(new t(s))
						})), u
					}
					var v, f, m;
					return s.swiper = l, c.data("swiper", l), s && s.shadowRoot && s.shadowRoot.querySelector ? (v = n(s.shadowRoot.querySelector("." + l.params.wrapperClass))).children = function (e) {
						return c.children(e)
					} : v = c.children("." + l.params.wrapperClass), d.extend(l, {
						$el: c,
						el: s,
						$wrapperEl: v,
						wrapperEl: v[0],
						classNames: [],
						slides: n(),
						slidesGrid: [],
						snapGrid: [],
						slidesSizesGrid: [],
						isHorizontal: function () {
							return "horizontal" === l.params.direction
						},
						isVertical: function () {
							return "vertical" === l.params.direction
						},
						rtl: "rtl" === s.dir.toLowerCase() || "rtl" === c.css("direction"),
						rtlTranslate: "horizontal" === l.params.direction && ("rtl" === s.dir.toLowerCase() || "rtl" === c.css("direction")),
						wrongRTL: "-webkit-box" === v.css("display"),
						activeIndex: 0,
						realIndex: 0,
						isBeginning: !0,
						isEnd: !1,
						translate: 0,
						previousTranslate: 0,
						progress: 0,
						velocity: 0,
						animating: !1,
						allowSlideNext: l.params.allowSlideNext,
						allowSlidePrev: l.params.allowSlidePrev,
						touchEvents: (f = ["touchstart", "touchmove", "touchend", "touchcancel"], m = ["mousedown", "mousemove", "mouseup"], h.pointerEvents && (m = ["pointerdown", "pointermove", "pointerup"]), l.touchEventsTouch = {
							start: f[0],
							move: f[1],
							end: f[2],
							cancel: f[3]
						}, l.touchEventsDesktop = {
							start: m[0],
							move: m[1],
							end: m[2]
						}, h.touch || !l.params.simulateTouch ? l.touchEventsTouch : l.touchEventsDesktop),
						touchEventsData: {
							isTouched: void 0,
							isMoved: void 0,
							allowTouchCallbacks: void 0,
							touchStartTime: void 0,
							isScrolling: void 0,
							currentTranslate: void 0,
							startTranslate: void 0,
							allowThresholdMove: void 0,
							formElements: "input, select, option, textarea, button, video, label",
							lastClickTime: d.now(),
							clickTimeout: void 0,
							velocities: [],
							allowMomentumBounce: void 0,
							isTouchEvent: void 0,
							startMoving: void 0
						},
						allowClick: !0,
						allowTouchMove: l.params.allowTouchMove,
						touches: {
							startX: 0,
							startY: 0,
							currentX: 0,
							currentY: 0,
							diff: 0
						},
						imagesToLoad: [],
						imagesLoaded: 0
					}), l.useModules(), l.params.init && l.init(), l
				}
			}
			e && (t.__proto__ = e), t.prototype = Object.create(e && e.prototype), t.prototype.constructor = t;
			var i = {
				extendedDefaults: {
					configurable: !0
				},
				defaults: {
					configurable: !0
				},
				Class: {
					configurable: !0
				},
				$: {
					configurable: !0
				}
			};
			return t.prototype.slidesPerViewDynamic = function () {
				var e = this.params,
					t = this.slides,
					i = this.slidesGrid,
					s = this.size,
					a = this.activeIndex,
					r = 1;
				if (e.centeredSlides) {
					for (var n, o = t[a].swiperSlideSize, l = a + 1; l < t.length; l += 1) t[l] && !n && (r += 1, (o += t[l].swiperSlideSize) > s && (n = !0));
					for (var d = a - 1; d >= 0; d -= 1) t[d] && !n && (r += 1, (o += t[d].swiperSlideSize) > s && (n = !0))
				} else
					for (var h = a + 1; h < t.length; h += 1) i[h] - i[a] < s && (r += 1);
				return r
			}, t.prototype.update = function () {
				var e = this;
				if (e && !e.destroyed) {
					var t = e.snapGrid,
						i = e.params;
					i.breakpoints && e.setBreakpoint(), e.updateSize(), e.updateSlides(), e.updateProgress(), e.updateSlidesClasses(), e.params.freeMode ? (s(), e.params.autoHeight && e.updateAutoHeight()) : (("auto" === e.params.slidesPerView || e.params.slidesPerView > 1) && e.isEnd && !e.params.centeredSlides ? e.slideTo(e.slides.length - 1, 0, !1, !0) : e.slideTo(e.activeIndex, 0, !1, !0)) || s(), i.watchOverflow && t !== e.snapGrid && e.checkOverflow(), e.emit("update")
				}

				function s() {
					var t = e.rtlTranslate ? -1 * e.translate : e.translate,
						i = Math.min(Math.max(t, e.maxTranslate()), e.minTranslate());
					e.setTranslate(i), e.updateActiveIndex(), e.updateSlidesClasses()
				}
			}, t.prototype.changeDirection = function (e, t) {
				void 0 === t && (t = !0);
				var i = this.params.direction;
				return e || (e = "horizontal" === i ? "vertical" : "horizontal"), e === i || "horizontal" !== e && "vertical" !== e || (this.$el.removeClass("" + this.params.containerModifierClass + i).addClass("" + this.params.containerModifierClass + e), this.params.direction = e, this.slides.each((function (t, i) {
					"vertical" === e ? i.style.width = "" : i.style.height = ""
				})), this.emit("changeDirection"), t && this.update()), this
			}, t.prototype.init = function () {
				this.initialized || (this.emit("beforeInit"), this.params.breakpoints && this.setBreakpoint(), this.addClasses(), this.params.loop && this.loopCreate(), this.updateSize(), this.updateSlides(), this.params.watchOverflow && this.checkOverflow(), this.params.grabCursor && this.setGrabCursor(), this.params.preloadImages && this.preloadImages(), this.params.loop ? this.slideTo(this.params.initialSlide + this.loopedSlides, 0, this.params.runCallbacksOnInit) : this.slideTo(this.params.initialSlide, 0, this.params.runCallbacksOnInit), this.attachEvents(), this.initialized = !0, this.emit("init"))
			}, t.prototype.destroy = function (e, t) {
				void 0 === e && (e = !0), void 0 === t && (t = !0);
				var i = this,
					s = i.params,
					a = i.$el,
					r = i.$wrapperEl,
					n = i.slides;
				return void 0 === i.params || i.destroyed || (i.emit("beforeDestroy"), i.initialized = !1, i.detachEvents(), s.loop && i.loopDestroy(), t && (i.removeClasses(), a.removeAttr("style"), r.removeAttr("style"), n && n.length && n.removeClass([s.slideVisibleClass, s.slideActiveClass, s.slideNextClass, s.slidePrevClass].join(" ")).removeAttr("style").removeAttr("data-swiper-slide-index")), i.emit("destroy"), Object.keys(i.eventsListeners).forEach((function (e) {
					i.off(e)
				})), !1 !== e && (i.$el[0].swiper = null, i.$el.data("swiper", null), d.deleteProps(i)), i.destroyed = !0), null
			}, t.extendDefaults = function (e) {
				d.extend(q, e)
			}, i.extendedDefaults.get = function () {
				return q
			}, i.defaults.get = function () {
				return W
			}, i.Class.get = function () {
				return e
			}, i.$.get = function () {
				return n
			}, Object.defineProperties(t, i), t
		}(p),
		K = {
			name: "device",
			proto: {
				device: A
			},
			static: {
				device: A
			}
		},
		U = {
			name: "support",
			proto: {
				support: h
			},
			static: {
				support: h
			}
		},
		_ = {
			isEdge: !!a.navigator.userAgent.match(/Edge/g),
			isSafari: function () {
				var e = a.navigator.userAgent.toLowerCase();
				return e.indexOf("safari") >= 0 && e.indexOf("chrome") < 0 && e.indexOf("android") < 0
			}(),
			isWebView: /(iPhone|iPod|iPad).*AppleWebKit(?!.*Safari)/i.test(a.navigator.userAgent)
		},
		Z = {
			name: "browser",
			proto: {
				browser: _
			},
			static: {
				browser: _
			}
		},
		Q = {
			name: "resize",
			create: function () {
				var e = this;
				d.extend(e, {
					resize: {
						resizeHandler: function () {
							e && !e.destroyed && e.initialized && (e.emit("beforeResize"), e.emit("resize"))
						},
						orientationChangeHandler: function () {
							e && !e.destroyed && e.initialized && e.emit("orientationchange")
						}
					}
				})
			},
			on: {
				init: function () {
					a.addEventListener("resize", this.resize.resizeHandler), a.addEventListener("orientationchange", this.resize.orientationChangeHandler)
				},
				destroy: function () {
					a.removeEventListener("resize", this.resize.resizeHandler), a.removeEventListener("orientationchange", this.resize.orientationChangeHandler)
				}
			}
		},
		J = {
			func: a.MutationObserver || a.WebkitMutationObserver,
			attach: function (e, t) {
				void 0 === t && (t = {});
				var i = this,
					s = new(0, J.func)((function (e) {
						if (1 !== e.length) {
							var t = function () {
								i.emit("observerUpdate", e[0])
							};
							a.requestAnimationFrame ? a.requestAnimationFrame(t) : a.setTimeout(t, 0)
						} else i.emit("observerUpdate", e[0])
					}));
				s.observe(e, {
					attributes: void 0 === t.attributes || t.attributes,
					childList: void 0 === t.childList || t.childList,
					characterData: void 0 === t.characterData || t.characterData
				}), i.observer.observers.push(s)
			},
			init: function () {
				if (h.observer && this.params.observer) {
					if (this.params.observeParents)
						for (var e = this.$el.parents(), t = 0; t < e.length; t += 1) this.observer.attach(e[t]);
					this.observer.attach(this.$el[0], {
						childList: this.params.observeSlideChildren
					}), this.observer.attach(this.$wrapperEl[0], {
						attributes: !1
					})
				}
			},
			destroy: function () {
				this.observer.observers.forEach((function (e) {
					e.disconnect()
				})), this.observer.observers = []
			}
		},
		ee = {
			name: "observer",
			params: {
				observer: !1,
				observeParents: !1,
				observeSlideChildren: !1
			},
			create: function () {
				d.extend(this, {
					observer: {
						init: J.init.bind(this),
						attach: J.attach.bind(this),
						destroy: J.destroy.bind(this),
						observers: []
					}
				})
			},
			on: {
				init: function () {
					this.observer.init()
				},
				destroy: function () {
					this.observer.destroy()
				}
			}
		},
		te = {
			update: function (e) {
				var t = this,
					i = t.params,
					s = i.slidesPerView,
					a = i.slidesPerGroup,
					r = i.centeredSlides,
					n = t.params.virtual,
					o = n.addSlidesBefore,
					l = n.addSlidesAfter,
					h = t.virtual,
					p = h.from,
					c = h.to,
					u = h.slides,
					v = h.slidesGrid,
					f = h.renderSlide,
					m = h.offset;
				t.updateActiveIndex();
				var g, b, w, y = t.activeIndex || 0;
				g = t.rtlTranslate ? "right" : t.isHorizontal() ? "left" : "top", r ? (b = Math.floor(s / 2) + a + o, w = Math.floor(s / 2) + a + l) : (b = s + (a - 1) + o, w = a + l);
				var x = Math.max((y || 0) - w, 0),
					E = Math.min((y || 0) + b, u.length - 1),
					T = (t.slidesGrid[x] || 0) - (t.slidesGrid[0] || 0);

				function S() {
					t.updateSlides(), t.updateProgress(), t.updateSlidesClasses(), t.lazy && t.params.lazy.enabled && t.lazy.load()
				}
				if (d.extend(t.virtual, {
						from: x,
						to: E,
						offset: T,
						slidesGrid: t.slidesGrid
					}), p === x && c === E && !e) return t.slidesGrid !== v && T !== m && t.slides.css(g, T + "px"), void t.updateProgress();
				if (t.params.virtual.renderExternal) return t.params.virtual.renderExternal.call(t, {
					offset: T,
					from: x,
					to: E,
					slides: function () {
						for (var e = [], t = x; t <= E; t += 1) e.push(u[t]);
						return e
					}()
				}), void S();
				var C = [],
					M = [];
				if (e) t.$wrapperEl.find("." + t.params.slideClass).remove();
				else
					for (var P = p; P <= c; P += 1)(P < x || P > E) && t.$wrapperEl.find("." + t.params.slideClass + '[data-swiper-slide-index="' + P + '"]').remove();
				for (var z = 0; z < u.length; z += 1) z >= x && z <= E && (void 0 === c || e ? M.push(z) : (z > c && M.push(z), z < p && C.push(z)));
				M.forEach((function (e) {
					t.$wrapperEl.append(f(u[e], e))
				})), C.sort((function (e, t) {
					return t - e
				})).forEach((function (e) {
					t.$wrapperEl.prepend(f(u[e], e))
				})), t.$wrapperEl.children(".swiper-slide").css(g, T + "px"), S()
			},
			renderSlide: function (e, t) {
				var i = this.params.virtual;
				if (i.cache && this.virtual.cache[t]) return this.virtual.cache[t];
				var s = i.renderSlide ? n(i.renderSlide.call(this, e, t)) : n('<div class="' + this.params.slideClass + '" data-swiper-slide-index="' + t + '">' + e + "</div>");
				return s.attr("data-swiper-slide-index") || s.attr("data-swiper-slide-index", t), i.cache && (this.virtual.cache[t] = s), s
			},
			appendSlide: function (e) {
				if ("object" == typeof e && "length" in e)
					for (var t = 0; t < e.length; t += 1) e[t] && this.virtual.slides.push(e[t]);
				else this.virtual.slides.push(e);
				this.virtual.update(!0)
			},
			prependSlide: function (e) {
				var t = this.activeIndex,
					i = t + 1,
					s = 1;
				if (Array.isArray(e)) {
					for (var a = 0; a < e.length; a += 1) e[a] && this.virtual.slides.unshift(e[a]);
					i = t + e.length, s = e.length
				} else this.virtual.slides.unshift(e);
				if (this.params.virtual.cache) {
					var r = this.virtual.cache,
						n = {};
					Object.keys(r).forEach((function (e) {
						var t = r[e],
							i = t.attr("data-swiper-slide-index");
						i && t.attr("data-swiper-slide-index", parseInt(i, 10) + 1), n[parseInt(e, 10) + s] = t
					})), this.virtual.cache = n
				}
				this.virtual.update(!0), this.slideTo(i, 0)
			},
			removeSlide: function (e) {
				if (null != e) {
					var t = this.activeIndex;
					if (Array.isArray(e))
						for (var i = e.length - 1; i >= 0; i -= 1) this.virtual.slides.splice(e[i], 1), this.params.virtual.cache && delete this.virtual.cache[e[i]], e[i] < t && (t -= 1), t = Math.max(t, 0);
					else this.virtual.slides.splice(e, 1), this.params.virtual.cache && delete this.virtual.cache[e], e < t && (t -= 1), t = Math.max(t, 0);
					this.virtual.update(!0), this.slideTo(t, 0)
				}
			},
			removeAllSlides: function () {
				this.virtual.slides = [], this.params.virtual.cache && (this.virtual.cache = {}), this.virtual.update(!0), this.slideTo(0, 0)
			}
		},
		ie = {
			name: "virtual",
			params: {
				virtual: {
					enabled: !1,
					slides: [],
					cache: !0,
					renderSlide: null,
					renderExternal: null,
					addSlidesBefore: 0,
					addSlidesAfter: 0
				}
			},
			create: function () {
				d.extend(this, {
					virtual: {
						update: te.update.bind(this),
						appendSlide: te.appendSlide.bind(this),
						prependSlide: te.prependSlide.bind(this),
						removeSlide: te.removeSlide.bind(this),
						removeAllSlides: te.removeAllSlides.bind(this),
						renderSlide: te.renderSlide.bind(this),
						slides: this.params.virtual.slides,
						cache: {}
					}
				})
			},
			on: {
				beforeInit: function () {
					if (this.params.virtual.enabled) {
						this.classNames.push(this.params.containerModifierClass + "virtual");
						var e = {
							watchSlidesProgress: !0
						};
						d.extend(this.params, e), d.extend(this.originalParams, e), this.params.initialSlide || this.virtual.update()
					}
				},
				setTranslate: function () {
					this.params.virtual.enabled && this.virtual.update()
				}
			}
		},
		se = {
			handle: function (e) {
				var t = this.rtlTranslate,
					s = e;
				s.originalEvent && (s = s.originalEvent);
				var r = s.keyCode || s.charCode,
					n = this.params.keyboard.pageUpDown,
					o = n && 33 === r,
					l = n && 34 === r,
					d = 37 === r,
					h = 39 === r,
					p = 38 === r,
					c = 40 === r;
				if (!this.allowSlideNext && (this.isHorizontal() && h || this.isVertical() && c || l)) return !1;
				if (!this.allowSlidePrev && (this.isHorizontal() && d || this.isVertical() && p || o)) return !1;
				if (!(s.shiftKey || s.altKey || s.ctrlKey || s.metaKey || i.activeElement && i.activeElement.nodeName && ("input" === i.activeElement.nodeName.toLowerCase() || "textarea" === i.activeElement.nodeName.toLowerCase()))) {
					if (this.params.keyboard.onlyInViewport && (o || l || d || h || p || c)) {
						var u = !1;
						if (this.$el.parents("." + this.params.slideClass).length > 0 && 0 === this.$el.parents("." + this.params.slideActiveClass).length) return;
						var v = a.innerWidth,
							f = a.innerHeight,
							m = this.$el.offset();
						t && (m.left -= this.$el[0].scrollLeft);
						for (var g = [
								[m.left, m.top],
								[m.left + this.width, m.top],
								[m.left, m.top + this.height],
								[m.left + this.width, m.top + this.height]
							], b = 0; b < g.length; b += 1) {
							var w = g[b];
							w[0] >= 0 && w[0] <= v && w[1] >= 0 && w[1] <= f && (u = !0)
						}
						if (!u) return
					}
					this.isHorizontal() ? ((o || l || d || h) && (s.preventDefault ? s.preventDefault() : s.returnValue = !1), ((l || h) && !t || (o || d) && t) && this.slideNext(), ((o || d) && !t || (l || h) && t) && this.slidePrev()) : ((o || l || p || c) && (s.preventDefault ? s.preventDefault() : s.returnValue = !1), (l || c) && this.slideNext(), (o || p) && this.slidePrev()), this.emit("keyPress", r)
				}
			},
			enable: function () {
				this.keyboard.enabled || (n(i).on("keydown", this.keyboard.handle), this.keyboard.enabled = !0)
			},
			disable: function () {
				this.keyboard.enabled && (n(i).off("keydown", this.keyboard.handle), this.keyboard.enabled = !1)
			}
		},
		ae = {
			name: "keyboard",
			params: {
				keyboard: {
					enabled: !1,
					onlyInViewport: !0,
					pageUpDown: !0
				}
			},
			create: function () {
				d.extend(this, {
					keyboard: {
						enabled: !1,
						enable: se.enable.bind(this),
						disable: se.disable.bind(this),
						handle: se.handle.bind(this)
					}
				})
			},
			on: {
				init: function () {
					this.params.keyboard.enabled && this.keyboard.enable()
				},
				destroy: function () {
					this.keyboard.enabled && this.keyboard.disable()
				}
			}
		};
	var re = {
			lastScrollTime: d.now(),
			lastEventBeforeSnap: void 0,
			recentWheelEvents: [],
			event: function () {
				return a.navigator.userAgent.indexOf("firefox") > -1 ? "DOMMouseScroll" : function () {
					var e = "onwheel" in i;
					if (!e) {
						var t = i.createElement("div");
						t.setAttribute("onwheel", "return;"), e = "function" == typeof t.onwheel
					}
					return !e && i.implementation && i.implementation.hasFeature && !0 !== i.implementation.hasFeature("", "") && (e = i.implementation.hasFeature("Events.wheel", "3.0")), e
				}() ? "wheel" : "mousewheel"
			},
			normalize: function (e) {
				var t = 0,
					i = 0,
					s = 0,
					a = 0;
				return "detail" in e && (i = e.detail), "wheelDelta" in e && (i = -e.wheelDelta / 120), "wheelDeltaY" in e && (i = -e.wheelDeltaY / 120), "wheelDeltaX" in e && (t = -e.wheelDeltaX / 120), "axis" in e && e.axis === e.HORIZONTAL_AXIS && (t = i, i = 0), s = 10 * t, a = 10 * i, "deltaY" in e && (a = e.deltaY), "deltaX" in e && (s = e.deltaX), e.shiftKey && !s && (s = a, a = 0), (s || a) && e.deltaMode && (1 === e.deltaMode ? (s *= 40, a *= 40) : (s *= 800, a *= 800)), s && !t && (t = s < 1 ? -1 : 1), a && !i && (i = a < 1 ? -1 : 1), {
					spinX: t,
					spinY: i,
					pixelX: s,
					pixelY: a
				}
			},
			handleMouseEnter: function () {
				this.mouseEntered = !0
			},
			handleMouseLeave: function () {
				this.mouseEntered = !1
			},
			handle: function (e) {
				var t = e,
					i = this,
					s = i.params.mousewheel;
				i.params.cssMode && t.preventDefault();
				var a = i.$el;
				if ("container" !== i.params.mousewheel.eventsTarged && (a = n(i.params.mousewheel.eventsTarged)), !i.mouseEntered && !a[0].contains(t.target) && !s.releaseOnEdges) return !0;
				t.originalEvent && (t = t.originalEvent);
				var r = 0,
					o = i.rtlTranslate ? -1 : 1,
					l = re.normalize(t);
				if (s.forceToAxis)
					if (i.isHorizontal()) {
						if (!(Math.abs(l.pixelX) > Math.abs(l.pixelY))) return !0;
						r = -l.pixelX * o
					} else {
						if (!(Math.abs(l.pixelY) > Math.abs(l.pixelX))) return !0;
						r = -l.pixelY
					}
				else r = Math.abs(l.pixelX) > Math.abs(l.pixelY) ? -l.pixelX * o : -l.pixelY;
				if (0 === r) return !0;
				if (s.invert && (r = -r), i.params.freeMode) {
					var h = {
							time: d.now(),
							delta: Math.abs(r),
							direction: Math.sign(r)
						},
						p = i.mousewheel.lastEventBeforeSnap,
						c = p && h.time < p.time + 500 && h.delta <= p.delta && h.direction === p.direction;
					if (!c) {
						i.mousewheel.lastEventBeforeSnap = void 0, i.params.loop && i.loopFix();
						var u = i.getTranslate() + r * s.sensitivity,
							v = i.isBeginning,
							f = i.isEnd;
						if (u >= i.minTranslate() && (u = i.minTranslate()), u <= i.maxTranslate() && (u = i.maxTranslate()), i.setTransition(0), i.setTranslate(u), i.updateProgress(), i.updateActiveIndex(), i.updateSlidesClasses(), (!v && i.isBeginning || !f && i.isEnd) && i.updateSlidesClasses(), i.params.freeModeSticky) {
							clearTimeout(i.mousewheel.timeout), i.mousewheel.timeout = void 0;
							var m = i.mousewheel.recentWheelEvents;
							m.length >= 15 && m.shift();
							var g = m.length ? m[m.length - 1] : void 0,
								b = m[0];
							if (m.push(h), g && (h.delta > g.delta || h.direction !== g.direction)) m.splice(0);
							else if (m.length >= 15 && h.time - b.time < 500 && b.delta - h.delta >= 1 && h.delta <= 6) {
								var w = r > 0 ? .8 : .2;
								i.mousewheel.lastEventBeforeSnap = h, m.splice(0), i.mousewheel.timeout = d.nextTick((function () {
									i.slideToClosest(i.params.speed, !0, void 0, w)
								}), 0)
							}
							i.mousewheel.timeout || (i.mousewheel.timeout = d.nextTick((function () {
								i.mousewheel.lastEventBeforeSnap = h, m.splice(0), i.slideToClosest(i.params.speed, !0, void 0, .5)
							}), 500))
						}
						if (c || i.emit("scroll", t), i.params.autoplay && i.params.autoplayDisableOnInteraction && i.autoplay.stop(), u === i.minTranslate() || u === i.maxTranslate()) return !0
					}
				} else {
					var y = {
							time: d.now(),
							delta: Math.abs(r),
							direction: Math.sign(r),
							raw: e
						},
						x = i.mousewheel.recentWheelEvents;
					x.length >= 2 && x.shift();
					var E = x.length ? x[x.length - 1] : void 0;
					if (x.push(y), E ? (y.direction !== E.direction || y.delta > E.delta || y.time > E.time + 150) && i.mousewheel.animateSlider(y) : i.mousewheel.animateSlider(y), i.mousewheel.releaseScroll(y)) return !0
				}
				return t.preventDefault ? t.preventDefault() : t.returnValue = !1, !1
			},
			animateSlider: function (e) {
				return e.delta >= 6 && d.now() - this.mousewheel.lastScrollTime < 60 || (e.direction < 0 ? this.isEnd && !this.params.loop || this.animating || (this.slideNext(), this.emit("scroll", e.raw)) : this.isBeginning && !this.params.loop || this.animating || (this.slidePrev(), this.emit("scroll", e.raw)), this.mousewheel.lastScrollTime = (new a.Date).getTime(), !1)
			},
			releaseScroll: function (e) {
				var t = this.params.mousewheel;
				if (e.direction < 0) {
					if (this.isEnd && !this.params.loop && t.releaseOnEdges) return !0
				} else if (this.isBeginning && !this.params.loop && t.releaseOnEdges) return !0;
				return !1
			},
			enable: function () {
				var e = re.event();
				if (this.params.cssMode) return this.wrapperEl.removeEventListener(e, this.mousewheel.handle), !0;
				if (!e) return !1;
				if (this.mousewheel.enabled) return !1;
				var t = this.$el;
				return "container" !== this.params.mousewheel.eventsTarged && (t = n(this.params.mousewheel.eventsTarged)), t.on("mouseenter", this.mousewheel.handleMouseEnter), t.on("mouseleave", this.mousewheel.handleMouseLeave), t.on(e, this.mousewheel.handle), this.mousewheel.enabled = !0, !0
			},
			disable: function () {
				var e = re.event();
				if (this.params.cssMode) return this.wrapperEl.addEventListener(e, this.mousewheel.handle), !0;
				if (!e) return !1;
				if (!this.mousewheel.enabled) return !1;
				var t = this.$el;
				return "container" !== this.params.mousewheel.eventsTarged && (t = n(this.params.mousewheel.eventsTarged)), t.off(e, this.mousewheel.handle), this.mousewheel.enabled = !1, !0
			}
		},
		ne = {
			update: function () {
				var e = this.params.navigation;
				if (!this.params.loop) {
					var t = this.navigation,
						i = t.$nextEl,
						s = t.$prevEl;
					s && s.length > 0 && (this.isBeginning ? s.addClass(e.disabledClass) : s.removeClass(e.disabledClass), s[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](e.lockClass)), i && i.length > 0 && (this.isEnd ? i.addClass(e.disabledClass) : i.removeClass(e.disabledClass), i[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](e.lockClass))
				}
			},
			onPrevClick: function (e) {
				e.preventDefault(), this.isBeginning && !this.params.loop || this.slidePrev()
			},
			onNextClick: function (e) {
				e.preventDefault(), this.isEnd && !this.params.loop || this.slideNext()
			},
			init: function () {
				var e, t, i = this.params.navigation;
				(i.nextEl || i.prevEl) && (i.nextEl && (e = n(i.nextEl), this.params.uniqueNavElements && "string" == typeof i.nextEl && e.length > 1 && 1 === this.$el.find(i.nextEl).length && (e = this.$el.find(i.nextEl))), i.prevEl && (t = n(i.prevEl), this.params.uniqueNavElements && "string" == typeof i.prevEl && t.length > 1 && 1 === this.$el.find(i.prevEl).length && (t = this.$el.find(i.prevEl))), e && e.length > 0 && e.on("click", this.navigation.onNextClick), t && t.length > 0 && t.on("click", this.navigation.onPrevClick), d.extend(this.navigation, {
					$nextEl: e,
					nextEl: e && e[0],
					$prevEl: t,
					prevEl: t && t[0]
				}))
			},
			destroy: function () {
				var e = this.navigation,
					t = e.$nextEl,
					i = e.$prevEl;
				t && t.length && (t.off("click", this.navigation.onNextClick), t.removeClass(this.params.navigation.disabledClass)), i && i.length && (i.off("click", this.navigation.onPrevClick), i.removeClass(this.params.navigation.disabledClass))
			}
		},
		oe = {
			update: function () {
				var e = this.rtl,
					t = this.params.pagination;
				if (t.el && this.pagination.el && this.pagination.$el && 0 !== this.pagination.$el.length) {
					var i, s = this.virtual && this.params.virtual.enabled ? this.virtual.slides.length : this.slides.length,
						a = this.pagination.$el,
						r = this.params.loop ? Math.ceil((s - 2 * this.loopedSlides) / this.params.slidesPerGroup) : this.snapGrid.length;
					if (this.params.loop ? ((i = Math.ceil((this.activeIndex - this.loopedSlides) / this.params.slidesPerGroup)) > s - 1 - 2 * this.loopedSlides && (i -= s - 2 * this.loopedSlides), i > r - 1 && (i -= r), i < 0 && "bullets" !== this.params.paginationType && (i = r + i)) : i = void 0 !== this.snapIndex ? this.snapIndex : this.activeIndex || 0, "bullets" === t.type && this.pagination.bullets && this.pagination.bullets.length > 0) {
						var o, l, d, h = this.pagination.bullets;
						if (t.dynamicBullets && (this.pagination.bulletSize = h.eq(0)[this.isHorizontal() ? "outerWidth" : "outerHeight"](!0), a.css(this.isHorizontal() ? "width" : "height", this.pagination.bulletSize * (t.dynamicMainBullets + 4) + "px"), t.dynamicMainBullets > 1 && void 0 !== this.previousIndex && (this.pagination.dynamicBulletIndex += i - this.previousIndex, this.pagination.dynamicBulletIndex > t.dynamicMainBullets - 1 ? this.pagination.dynamicBulletIndex = t.dynamicMainBullets - 1 : this.pagination.dynamicBulletIndex < 0 && (this.pagination.dynamicBulletIndex = 0)), o = i - this.pagination.dynamicBulletIndex, d = ((l = o + (Math.min(h.length, t.dynamicMainBullets) - 1)) + o) / 2), h.removeClass(t.bulletActiveClass + " " + t.bulletActiveClass + "-next " + t.bulletActiveClass + "-next-next " + t.bulletActiveClass + "-prev " + t.bulletActiveClass + "-prev-prev " + t.bulletActiveClass + "-main"), a.length > 1) h.each((function (e, s) {
							var a = n(s),
								r = a.index();
							r === i && a.addClass(t.bulletActiveClass), t.dynamicBullets && (r >= o && r <= l && a.addClass(t.bulletActiveClass + "-main"), r === o && a.prev().addClass(t.bulletActiveClass + "-prev").prev().addClass(t.bulletActiveClass + "-prev-prev"), r === l && a.next().addClass(t.bulletActiveClass + "-next").next().addClass(t.bulletActiveClass + "-next-next"))
						}));
						else {
							var p = h.eq(i),
								c = p.index();
							if (p.addClass(t.bulletActiveClass), t.dynamicBullets) {
								for (var u = h.eq(o), v = h.eq(l), f = o; f <= l; f += 1) h.eq(f).addClass(t.bulletActiveClass + "-main");
								if (this.params.loop)
									if (c >= h.length - t.dynamicMainBullets) {
										for (var m = t.dynamicMainBullets; m >= 0; m -= 1) h.eq(h.length - m).addClass(t.bulletActiveClass + "-main");
										h.eq(h.length - t.dynamicMainBullets - 1).addClass(t.bulletActiveClass + "-prev")
									} else u.prev().addClass(t.bulletActiveClass + "-prev").prev().addClass(t.bulletActiveClass + "-prev-prev"), v.next().addClass(t.bulletActiveClass + "-next").next().addClass(t.bulletActiveClass + "-next-next");
								else u.prev().addClass(t.bulletActiveClass + "-prev").prev().addClass(t.bulletActiveClass + "-prev-prev"), v.next().addClass(t.bulletActiveClass + "-next").next().addClass(t.bulletActiveClass + "-next-next")
							}
						}
						if (t.dynamicBullets) {
							var g = Math.min(h.length, t.dynamicMainBullets + 4),
								b = (this.pagination.bulletSize * g - this.pagination.bulletSize) / 2 - d * this.pagination.bulletSize,
								w = e ? "right" : "left";
							h.css(this.isHorizontal() ? w : "top", b + "px")
						}
					}
					if ("fraction" === t.type && (a.find("." + t.currentClass).text(t.formatFractionCurrent(i + 1)), a.find("." + t.totalClass).text(t.formatFractionTotal(r))), "progressbar" === t.type) {
						var y;
						y = t.progressbarOpposite ? this.isHorizontal() ? "vertical" : "horizontal" : this.isHorizontal() ? "horizontal" : "vertical";
						var x = (i + 1) / r,
							E = 1,
							T = 1;
						"horizontal" === y ? E = x : T = x, a.find("." + t.progressbarFillClass).transform("translate3d(0,0,0) scaleX(" + E + ") scaleY(" + T + ")").transition(this.params.speed)
					}
					"custom" === t.type && t.renderCustom ? (a.html(t.renderCustom(this, i + 1, r)), this.emit("paginationRender", this, a[0])) : this.emit("paginationUpdate", this, a[0]), a[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](t.lockClass)
				}
			},
			render: function () {
				var e = this.params.pagination;
				if (e.el && this.pagination.el && this.pagination.$el && 0 !== this.pagination.$el.length) {
					var t = this.virtual && this.params.virtual.enabled ? this.virtual.slides.length : this.slides.length,
						i = this.pagination.$el,
						s = "";
					if ("bullets" === e.type) {
						for (var a = this.params.loop ? Math.ceil((t - 2 * this.loopedSlides) / this.params.slidesPerGroup) : this.snapGrid.length, r = 0; r < a; r += 1) e.renderBullet ? s += e.renderBullet.call(this, r, e.bulletClass) : s += "<" + e.bulletElement + ' class="' + e.bulletClass + '"></' + e.bulletElement + ">";
						i.html(s), this.pagination.bullets = i.find("." + e.bulletClass)
					}
					"fraction" === e.type && (s = e.renderFraction ? e.renderFraction.call(this, e.currentClass, e.totalClass) : '<span class="' + e.currentClass + '"></span> / <span class="' + e.totalClass + '"></span>', i.html(s)), "progressbar" === e.type && (s = e.renderProgressbar ? e.renderProgressbar.call(this, e.progressbarFillClass) : '<span class="' + e.progressbarFillClass + '"></span>', i.html(s)), "custom" !== e.type && this.emit("paginationRender", this.pagination.$el[0])
				}
			},
			init: function () {
				var e = this,
					t = e.params.pagination;
				if (t.el) {
					var i = n(t.el);
					0 !== i.length && (e.params.uniqueNavElements && "string" == typeof t.el && i.length > 1 && (i = e.$el.find(t.el)), "bullets" === t.type && t.clickable && i.addClass(t.clickableClass), i.addClass(t.modifierClass + t.type), "bullets" === t.type && t.dynamicBullets && (i.addClass("" + t.modifierClass + t.type + "-dynamic"), e.pagination.dynamicBulletIndex = 0, t.dynamicMainBullets < 1 && (t.dynamicMainBullets = 1)), "progressbar" === t.type && t.progressbarOpposite && i.addClass(t.progressbarOppositeClass), t.clickable && i.on("click", "." + t.bulletClass, (function (t) {
						t.preventDefault();
						var i = n(this).index() * e.params.slidesPerGroup;
						e.params.loop && (i += e.loopedSlides), e.slideTo(i)
					})), d.extend(e.pagination, {
						$el: i,
						el: i[0]
					}))
				}
			},
			destroy: function () {
				var e = this.params.pagination;
				if (e.el && this.pagination.el && this.pagination.$el && 0 !== this.pagination.$el.length) {
					var t = this.pagination.$el;
					t.removeClass(e.hiddenClass), t.removeClass(e.modifierClass + e.type), this.pagination.bullets && this.pagination.bullets.removeClass(e.bulletActiveClass), e.clickable && t.off("click", "." + e.bulletClass)
				}
			}
		},
		le = {
			setTranslate: function () {
				if (this.params.scrollbar.el && this.scrollbar.el) {
					var e = this.scrollbar,
						t = this.rtlTranslate,
						i = this.progress,
						s = e.dragSize,
						a = e.trackSize,
						r = e.$dragEl,
						n = e.$el,
						o = this.params.scrollbar,
						l = s,
						d = (a - s) * i;
					t ? (d = -d) > 0 ? (l = s - d, d = 0) : -d + s > a && (l = a + d) : d < 0 ? (l = s + d, d = 0) : d + s > a && (l = a - d), this.isHorizontal() ? (r.transform("translate3d(" + d + "px, 0, 0)"), r[0].style.width = l + "px") : (r.transform("translate3d(0px, " + d + "px, 0)"), r[0].style.height = l + "px"), o.hide && (clearTimeout(this.scrollbar.timeout), n[0].style.opacity = 1, this.scrollbar.timeout = setTimeout((function () {
						n[0].style.opacity = 0, n.transition(400)
					}), 1e3))
				}
			},
			setTransition: function (e) {
				this.params.scrollbar.el && this.scrollbar.el && this.scrollbar.$dragEl.transition(e)
			},
			updateSize: function () {
				if (this.params.scrollbar.el && this.scrollbar.el) {
					var e = this.scrollbar,
						t = e.$dragEl,
						i = e.$el;
					t[0].style.width = "", t[0].style.height = "";
					var s, a = this.isHorizontal() ? i[0].offsetWidth : i[0].offsetHeight,
						r = this.size / this.virtualSize,
						n = r * (a / this.size);
					s = "auto" === this.params.scrollbar.dragSize ? a * r : parseInt(this.params.scrollbar.dragSize, 10), this.isHorizontal() ? t[0].style.width = s + "px" : t[0].style.height = s + "px", i[0].style.display = r >= 1 ? "none" : "", this.params.scrollbar.hide && (i[0].style.opacity = 0), d.extend(e, {
						trackSize: a,
						divider: r,
						moveDivider: n,
						dragSize: s
					}), e.$el[this.params.watchOverflow && this.isLocked ? "addClass" : "removeClass"](this.params.scrollbar.lockClass)
				}
			},
			getPointerPosition: function (e) {
				return this.isHorizontal() ? "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].clientX : e.clientX : "touchstart" === e.type || "touchmove" === e.type ? e.targetTouches[0].clientY : e.clientY
			},
			setDragPosition: function (e) {
				var t, i = this.scrollbar,
					s = this.rtlTranslate,
					a = i.$el,
					r = i.dragSize,
					n = i.trackSize,
					o = i.dragStartPos;
				t = (i.getPointerPosition(e) - a.offset()[this.isHorizontal() ? "left" : "top"] - (null !== o ? o : r / 2)) / (n - r), t = Math.max(Math.min(t, 1), 0), s && (t = 1 - t);
				var l = this.minTranslate() + (this.maxTranslate() - this.minTranslate()) * t;
				this.updateProgress(l), this.setTranslate(l), this.updateActiveIndex(), this.updateSlidesClasses()
			},
			onDragStart: function (e) {
				var t = this.params.scrollbar,
					i = this.scrollbar,
					s = this.$wrapperEl,
					a = i.$el,
					r = i.$dragEl;
				this.scrollbar.isTouched = !0, this.scrollbar.dragStartPos = e.target === r[0] || e.target === r ? i.getPointerPosition(e) - e.target.getBoundingClientRect()[this.isHorizontal() ? "left" : "top"] : null, e.preventDefault(), e.stopPropagation(), s.transition(100), r.transition(100), i.setDragPosition(e), clearTimeout(this.scrollbar.dragTimeout), a.transition(0), t.hide && a.css("opacity", 1), this.params.cssMode && this.$wrapperEl.css("scroll-snap-type", "none"), this.emit("scrollbarDragStart", e)
			},
			onDragMove: function (e) {
				var t = this.scrollbar,
					i = this.$wrapperEl,
					s = t.$el,
					a = t.$dragEl;
				this.scrollbar.isTouched && (e.preventDefault ? e.preventDefault() : e.returnValue = !1, t.setDragPosition(e), i.transition(0), s.transition(0), a.transition(0), this.emit("scrollbarDragMove", e))
			},
			onDragEnd: function (e) {
				var t = this.params.scrollbar,
					i = this.scrollbar,
					s = this.$wrapperEl,
					a = i.$el;
				this.scrollbar.isTouched && (this.scrollbar.isTouched = !1, this.params.cssMode && (this.$wrapperEl.css("scroll-snap-type", ""), s.transition("")), t.hide && (clearTimeout(this.scrollbar.dragTimeout), this.scrollbar.dragTimeout = d.nextTick((function () {
					a.css("opacity", 0), a.transition(400)
				}), 1e3)), this.emit("scrollbarDragEnd", e), t.snapOnRelease && this.slideToClosest())
			},
			enableDraggable: function () {
				if (this.params.scrollbar.el) {
					var e = this.scrollbar,
						t = this.touchEventsTouch,
						s = this.touchEventsDesktop,
						a = this.params,
						r = e.$el[0],
						n = !(!h.passiveListener || !a.passiveListeners) && {
							passive: !1,
							capture: !1
						},
						o = !(!h.passiveListener || !a.passiveListeners) && {
							passive: !0,
							capture: !1
						};
					h.touch ? (r.addEventListener(t.start, this.scrollbar.onDragStart, n), r.addEventListener(t.move, this.scrollbar.onDragMove, n), r.addEventListener(t.end, this.scrollbar.onDragEnd, o)) : (r.addEventListener(s.start, this.scrollbar.onDragStart, n), i.addEventListener(s.move, this.scrollbar.onDragMove, n), i.addEventListener(s.end, this.scrollbar.onDragEnd, o))
				}
			},
			disableDraggable: function () {
				if (this.params.scrollbar.el) {
					var e = this.scrollbar,
						t = this.touchEventsTouch,
						s = this.touchEventsDesktop,
						a = this.params,
						r = e.$el[0],
						n = !(!h.passiveListener || !a.passiveListeners) && {
							passive: !1,
							capture: !1
						},
						o = !(!h.passiveListener || !a.passiveListeners) && {
							passive: !0,
							capture: !1
						};
					h.touch ? (r.removeEventListener(t.start, this.scrollbar.onDragStart, n), r.removeEventListener(t.move, this.scrollbar.onDragMove, n), r.removeEventListener(t.end, this.scrollbar.onDragEnd, o)) : (r.removeEventListener(s.start, this.scrollbar.onDragStart, n), i.removeEventListener(s.move, this.scrollbar.onDragMove, n), i.removeEventListener(s.end, this.scrollbar.onDragEnd, o))
				}
			},
			init: function () {
				if (this.params.scrollbar.el) {
					var e = this.scrollbar,
						t = this.$el,
						i = this.params.scrollbar,
						s = n(i.el);
					this.params.uniqueNavElements && "string" == typeof i.el && s.length > 1 && 1 === t.find(i.el).length && (s = t.find(i.el));
					var a = s.find("." + this.params.scrollbar.dragClass);
					0 === a.length && (a = n('<div class="' + this.params.scrollbar.dragClass + '"></div>'), s.append(a)), d.extend(e, {
						$el: s,
						el: s[0],
						$dragEl: a,
						dragEl: a[0]
					}), i.draggable && e.enableDraggable()
				}
			},
			destroy: function () {
				this.scrollbar.disableDraggable()
			}
		},
		de = {
			setTransform: function (e, t) {
				var i = this.rtl,
					s = n(e),
					a = i ? -1 : 1,
					r = s.attr("data-swiper-parallax") || "0",
					o = s.attr("data-swiper-parallax-x"),
					l = s.attr("data-swiper-parallax-y"),
					d = s.attr("data-swiper-parallax-scale"),
					h = s.attr("data-swiper-parallax-opacity");
				if (o || l ? (o = o || "0", l = l || "0") : this.isHorizontal() ? (o = r, l = "0") : (l = r, o = "0"), o = o.indexOf("%") >= 0 ? parseInt(o, 10) * t * a + "%" : o * t * a + "px", l = l.indexOf("%") >= 0 ? parseInt(l, 10) * t + "%" : l * t + "px", null != h) {
					var p = h - (h - 1) * (1 - Math.abs(t));
					s[0].style.opacity = p
				}
				if (null == d) s.transform("translate3d(" + o + ", " + l + ", 0px)");
				else {
					var c = d - (d - 1) * (1 - Math.abs(t));
					s.transform("translate3d(" + o + ", " + l + ", 0px) scale(" + c + ")")
				}
			},
			setTranslate: function () {
				var e = this,
					t = e.$el,
					i = e.slides,
					s = e.progress,
					a = e.snapGrid;
				t.children("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each((function (t, i) {
					e.parallax.setTransform(i, s)
				})), i.each((function (t, i) {
					var r = i.progress;
					e.params.slidesPerGroup > 1 && "auto" !== e.params.slidesPerView && (r += Math.ceil(t / 2) - s * (a.length - 1)), r = Math.min(Math.max(r, -1), 1), n(i).find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each((function (t, i) {
						e.parallax.setTransform(i, r)
					}))
				}))
			},
			setTransition: function (e) {
				void 0 === e && (e = this.params.speed);
				this.$el.find("[data-swiper-parallax], [data-swiper-parallax-x], [data-swiper-parallax-y], [data-swiper-parallax-opacity], [data-swiper-parallax-scale]").each((function (t, i) {
					var s = n(i),
						a = parseInt(s.attr("data-swiper-parallax-duration"), 10) || e;
					0 === e && (a = 0), s.transition(a)
				}))
			}
		},
		he = {
			getDistanceBetweenTouches: function (e) {
				if (e.targetTouches.length < 2) return 1;
				var t = e.targetTouches[0].pageX,
					i = e.targetTouches[0].pageY,
					s = e.targetTouches[1].pageX,
					a = e.targetTouches[1].pageY;
				return Math.sqrt(Math.pow(s - t, 2) + Math.pow(a - i, 2))
			},
			onGestureStart: function (e) {
				var t = this.params.zoom,
					i = this.zoom,
					s = i.gesture;
				if (i.fakeGestureTouched = !1, i.fakeGestureMoved = !1, !h.gestures) {
					if ("touchstart" !== e.type || "touchstart" === e.type && e.targetTouches.length < 2) return;
					i.fakeGestureTouched = !0, s.scaleStart = he.getDistanceBetweenTouches(e)
				}
				s.$slideEl && s.$slideEl.length || (s.$slideEl = n(e.target).closest("." + this.params.slideClass), 0 === s.$slideEl.length && (s.$slideEl = this.slides.eq(this.activeIndex)), s.$imageEl = s.$slideEl.find("img, svg, canvas, picture, .swiper-zoom-target"), s.$imageWrapEl = s.$imageEl.parent("." + t.containerClass), s.maxRatio = s.$imageWrapEl.attr("data-swiper-zoom") || t.maxRatio, 0 !== s.$imageWrapEl.length) ? (s.$imageEl && s.$imageEl.transition(0), this.zoom.isScaling = !0) : s.$imageEl = void 0
			},
			onGestureChange: function (e) {
				var t = this.params.zoom,
					i = this.zoom,
					s = i.gesture;
				if (!h.gestures) {
					if ("touchmove" !== e.type || "touchmove" === e.type && e.targetTouches.length < 2) return;
					i.fakeGestureMoved = !0, s.scaleMove = he.getDistanceBetweenTouches(e)
				}
				s.$imageEl && 0 !== s.$imageEl.length && (i.scale = h.gestures ? e.scale * i.currentScale : s.scaleMove / s.scaleStart * i.currentScale, i.scale > s.maxRatio && (i.scale = s.maxRatio - 1 + Math.pow(i.scale - s.maxRatio + 1, .5)), i.scale < t.minRatio && (i.scale = t.minRatio + 1 - Math.pow(t.minRatio - i.scale + 1, .5)), s.$imageEl.transform("translate3d(0,0,0) scale(" + i.scale + ")"))
			},
			onGestureEnd: function (e) {
				var t = this.params.zoom,
					i = this.zoom,
					s = i.gesture;
				if (!h.gestures) {
					if (!i.fakeGestureTouched || !i.fakeGestureMoved) return;
					if ("touchend" !== e.type || "touchend" === e.type && e.changedTouches.length < 2 && !A.android) return;
					i.fakeGestureTouched = !1, i.fakeGestureMoved = !1
				}
				s.$imageEl && 0 !== s.$imageEl.length && (i.scale = Math.max(Math.min(i.scale, s.maxRatio), t.minRatio), s.$imageEl.transition(this.params.speed).transform("translate3d(0,0,0) scale(" + i.scale + ")"), i.currentScale = i.scale, i.isScaling = !1, 1 === i.scale && (s.$slideEl = void 0))
			},
			onTouchStart: function (e) {
				var t = this.zoom,
					i = t.gesture,
					s = t.image;
				i.$imageEl && 0 !== i.$imageEl.length && (s.isTouched || (A.android && e.cancelable && e.preventDefault(), s.isTouched = !0, s.touchesStart.x = "touchstart" === e.type ? e.targetTouches[0].pageX : e.pageX, s.touchesStart.y = "touchstart" === e.type ? e.targetTouches[0].pageY : e.pageY))
			},
			onTouchMove: function (e) {
				var t = this.zoom,
					i = t.gesture,
					s = t.image,
					a = t.velocity;
				if (i.$imageEl && 0 !== i.$imageEl.length && (this.allowClick = !1, s.isTouched && i.$slideEl)) {
					s.isMoved || (s.width = i.$imageEl[0].offsetWidth, s.height = i.$imageEl[0].offsetHeight, s.startX = d.getTranslate(i.$imageWrapEl[0], "x") || 0, s.startY = d.getTranslate(i.$imageWrapEl[0], "y") || 0, i.slideWidth = i.$slideEl[0].offsetWidth, i.slideHeight = i.$slideEl[0].offsetHeight, i.$imageWrapEl.transition(0), this.rtl && (s.startX = -s.startX, s.startY = -s.startY));
					var r = s.width * t.scale,
						n = s.height * t.scale;
					if (!(r < i.slideWidth && n < i.slideHeight)) {
						if (s.minX = Math.min(i.slideWidth / 2 - r / 2, 0), s.maxX = -s.minX, s.minY = Math.min(i.slideHeight / 2 - n / 2, 0), s.maxY = -s.minY, s.touchesCurrent.x = "touchmove" === e.type ? e.targetTouches[0].pageX : e.pageX, s.touchesCurrent.y = "touchmove" === e.type ? e.targetTouches[0].pageY : e.pageY, !s.isMoved && !t.isScaling) {
							if (this.isHorizontal() && (Math.floor(s.minX) === Math.floor(s.startX) && s.touchesCurrent.x < s.touchesStart.x || Math.floor(s.maxX) === Math.floor(s.startX) && s.touchesCurrent.x > s.touchesStart.x)) return void(s.isTouched = !1);
							if (!this.isHorizontal() && (Math.floor(s.minY) === Math.floor(s.startY) && s.touchesCurrent.y < s.touchesStart.y || Math.floor(s.maxY) === Math.floor(s.startY) && s.touchesCurrent.y > s.touchesStart.y)) return void(s.isTouched = !1)
						}
						e.cancelable && e.preventDefault(), e.stopPropagation(), s.isMoved = !0, s.currentX = s.touchesCurrent.x - s.touchesStart.x + s.startX, s.currentY = s.touchesCurrent.y - s.touchesStart.y + s.startY, s.currentX < s.minX && (s.currentX = s.minX + 1 - Math.pow(s.minX - s.currentX + 1, .8)), s.currentX > s.maxX && (s.currentX = s.maxX - 1 + Math.pow(s.currentX - s.maxX + 1, .8)), s.currentY < s.minY && (s.currentY = s.minY + 1 - Math.pow(s.minY - s.currentY + 1, .8)), s.currentY > s.maxY && (s.currentY = s.maxY - 1 + Math.pow(s.currentY - s.maxY + 1, .8)), a.prevPositionX || (a.prevPositionX = s.touchesCurrent.x), a.prevPositionY || (a.prevPositionY = s.touchesCurrent.y), a.prevTime || (a.prevTime = Date.now()), a.x = (s.touchesCurrent.x - a.prevPositionX) / (Date.now() - a.prevTime) / 2, a.y = (s.touchesCurrent.y - a.prevPositionY) / (Date.now() - a.prevTime) / 2, Math.abs(s.touchesCurrent.x - a.prevPositionX) < 2 && (a.x = 0), Math.abs(s.touchesCurrent.y - a.prevPositionY) < 2 && (a.y = 0), a.prevPositionX = s.touchesCurrent.x, a.prevPositionY = s.touchesCurrent.y, a.prevTime = Date.now(), i.$imageWrapEl.transform("translate3d(" + s.currentX + "px, " + s.currentY + "px,0)")
					}
				}
			},
			onTouchEnd: function () {
				var e = this.zoom,
					t = e.gesture,
					i = e.image,
					s = e.velocity;
				if (t.$imageEl && 0 !== t.$imageEl.length) {
					if (!i.isTouched || !i.isMoved) return i.isTouched = !1, void(i.isMoved = !1);
					i.isTouched = !1, i.isMoved = !1;
					var a = 300,
						r = 300,
						n = s.x * a,
						o = i.currentX + n,
						l = s.y * r,
						d = i.currentY + l;
					0 !== s.x && (a = Math.abs((o - i.currentX) / s.x)), 0 !== s.y && (r = Math.abs((d - i.currentY) / s.y));
					var h = Math.max(a, r);
					i.currentX = o, i.currentY = d;
					var p = i.width * e.scale,
						c = i.height * e.scale;
					i.minX = Math.min(t.slideWidth / 2 - p / 2, 0), i.maxX = -i.minX, i.minY = Math.min(t.slideHeight / 2 - c / 2, 0), i.maxY = -i.minY, i.currentX = Math.max(Math.min(i.currentX, i.maxX), i.minX), i.currentY = Math.max(Math.min(i.currentY, i.maxY), i.minY), t.$imageWrapEl.transition(h).transform("translate3d(" + i.currentX + "px, " + i.currentY + "px,0)")
				}
			},
			onTransitionEnd: function () {
				var e = this.zoom,
					t = e.gesture;
				t.$slideEl && this.previousIndex !== this.activeIndex && (t.$imageEl && t.$imageEl.transform("translate3d(0,0,0) scale(1)"), t.$imageWrapEl && t.$imageWrapEl.transform("translate3d(0,0,0)"), e.scale = 1, e.currentScale = 1, t.$slideEl = void 0, t.$imageEl = void 0, t.$imageWrapEl = void 0)
			},
			toggle: function (e) {
				var t = this.zoom;
				t.scale && 1 !== t.scale ? t.out() : t.in(e)
			},
			in: function (e) {
				var t, i, s, a, r, n, o, l, d, h, p, c, u, v, f, m, g = this.zoom,
					b = this.params.zoom,
					w = g.gesture,
					y = g.image;
				(w.$slideEl || (this.params.virtual && this.params.virtual.enabled && this.virtual ? w.$slideEl = this.$wrapperEl.children("." + this.params.slideActiveClass) : w.$slideEl = this.slides.eq(this.activeIndex), w.$imageEl = w.$slideEl.find("img, svg, canvas, picture, .swiper-zoom-target"), w.$imageWrapEl = w.$imageEl.parent("." + b.containerClass)), w.$imageEl && 0 !== w.$imageEl.length) && (w.$slideEl.addClass("" + b.zoomedSlideClass), void 0 === y.touchesStart.x && e ? (t = "touchend" === e.type ? e.changedTouches[0].pageX : e.pageX, i = "touchend" === e.type ? e.changedTouches[0].pageY : e.pageY) : (t = y.touchesStart.x, i = y.touchesStart.y), g.scale = w.$imageWrapEl.attr("data-swiper-zoom") || b.maxRatio, g.currentScale = w.$imageWrapEl.attr("data-swiper-zoom") || b.maxRatio, e ? (f = w.$slideEl[0].offsetWidth, m = w.$slideEl[0].offsetHeight, s = w.$slideEl.offset().left + f / 2 - t, a = w.$slideEl.offset().top + m / 2 - i, o = w.$imageEl[0].offsetWidth, l = w.$imageEl[0].offsetHeight, d = o * g.scale, h = l * g.scale, u = -(p = Math.min(f / 2 - d / 2, 0)), v = -(c = Math.min(m / 2 - h / 2, 0)), (r = s * g.scale) < p && (r = p), r > u && (r = u), (n = a * g.scale) < c && (n = c), n > v && (n = v)) : (r = 0, n = 0), w.$imageWrapEl.transition(300).transform("translate3d(" + r + "px, " + n + "px,0)"), w.$imageEl.transition(300).transform("translate3d(0,0,0) scale(" + g.scale + ")"))
			},
			out: function () {
				var e = this.zoom,
					t = this.params.zoom,
					i = e.gesture;
				i.$slideEl || (this.params.virtual && this.params.virtual.enabled && this.virtual ? i.$slideEl = this.$wrapperEl.children("." + this.params.slideActiveClass) : i.$slideEl = this.slides.eq(this.activeIndex), i.$imageEl = i.$slideEl.find("img, svg, canvas, picture, .swiper-zoom-target"), i.$imageWrapEl = i.$imageEl.parent("." + t.containerClass)), i.$imageEl && 0 !== i.$imageEl.length && (e.scale = 1, e.currentScale = 1, i.$imageWrapEl.transition(300).transform("translate3d(0,0,0)"), i.$imageEl.transition(300).transform("translate3d(0,0,0) scale(1)"), i.$slideEl.removeClass("" + t.zoomedSlideClass), i.$slideEl = void 0)
			},
			enable: function () {
				var e = this.zoom;
				if (!e.enabled) {
					e.enabled = !0;
					var t = !("touchstart" !== this.touchEvents.start || !h.passiveListener || !this.params.passiveListeners) && {
							passive: !0,
							capture: !1
						},
						i = !h.passiveListener || {
							passive: !1,
							capture: !0
						},
						s = "." + this.params.slideClass;
					h.gestures ? (this.$wrapperEl.on("gesturestart", s, e.onGestureStart, t), this.$wrapperEl.on("gesturechange", s, e.onGestureChange, t), this.$wrapperEl.on("gestureend", s, e.onGestureEnd, t)) : "touchstart" === this.touchEvents.start && (this.$wrapperEl.on(this.touchEvents.start, s, e.onGestureStart, t), this.$wrapperEl.on(this.touchEvents.move, s, e.onGestureChange, i), this.$wrapperEl.on(this.touchEvents.end, s, e.onGestureEnd, t), this.touchEvents.cancel && this.$wrapperEl.on(this.touchEvents.cancel, s, e.onGestureEnd, t)), this.$wrapperEl.on(this.touchEvents.move, "." + this.params.zoom.containerClass, e.onTouchMove, i)
				}
			},
			disable: function () {
				var e = this.zoom;
				if (e.enabled) {
					this.zoom.enabled = !1;
					var t = !("touchstart" !== this.touchEvents.start || !h.passiveListener || !this.params.passiveListeners) && {
							passive: !0,
							capture: !1
						},
						i = !h.passiveListener || {
							passive: !1,
							capture: !0
						},
						s = "." + this.params.slideClass;
					h.gestures ? (this.$wrapperEl.off("gesturestart", s, e.onGestureStart, t), this.$wrapperEl.off("gesturechange", s, e.onGestureChange, t), this.$wrapperEl.off("gestureend", s, e.onGestureEnd, t)) : "touchstart" === this.touchEvents.start && (this.$wrapperEl.off(this.touchEvents.start, s, e.onGestureStart, t), this.$wrapperEl.off(this.touchEvents.move, s, e.onGestureChange, i), this.$wrapperEl.off(this.touchEvents.end, s, e.onGestureEnd, t), this.touchEvents.cancel && this.$wrapperEl.off(this.touchEvents.cancel, s, e.onGestureEnd, t)), this.$wrapperEl.off(this.touchEvents.move, "." + this.params.zoom.containerClass, e.onTouchMove, i)
				}
			}
		},
		pe = {
			loadInSlide: function (e, t) {
				void 0 === t && (t = !0);
				var i = this,
					s = i.params.lazy;
				if (void 0 !== e && 0 !== i.slides.length) {
					var a = i.virtual && i.params.virtual.enabled ? i.$wrapperEl.children("." + i.params.slideClass + '[data-swiper-slide-index="' + e + '"]') : i.slides.eq(e),
						r = a.find("." + s.elementClass + ":not(." + s.loadedClass + "):not(." + s.loadingClass + ")");
					!a.hasClass(s.elementClass) || a.hasClass(s.loadedClass) || a.hasClass(s.loadingClass) || (r = r.add(a[0])), 0 !== r.length && r.each((function (e, r) {
						var o = n(r);
						o.addClass(s.loadingClass);
						var l = o.attr("data-background"),
							d = o.attr("data-src"),
							h = o.attr("data-srcset"),
							p = o.attr("data-sizes"),
							c = o.parent("picture");
						i.loadImage(o[0], d || l, h, p, !1, (function () {
							if (null != i && i && (!i || i.params) && !i.destroyed) {
								if (l ? (o.css("background-image", 'url("' + l + '")'), o.removeAttr("data-background")) : (h && (o.attr("srcset", h), o.removeAttr("data-srcset")), p && (o.attr("sizes", p), o.removeAttr("data-sizes")), c.length && c.children("source").each((function (e, t) {
										var i = n(t);
										i.attr("data-srcset") && (i.attr("srcset", i.attr("data-srcset")), i.removeAttr("data-srcset"))
									})), d && (o.attr("src", d), o.removeAttr("data-src"))), o.addClass(s.loadedClass).removeClass(s.loadingClass), a.find("." + s.preloaderClass).remove(), i.params.loop && t) {
									var e = a.attr("data-swiper-slide-index");
									if (a.hasClass(i.params.slideDuplicateClass)) {
										var r = i.$wrapperEl.children('[data-swiper-slide-index="' + e + '"]:not(.' + i.params.slideDuplicateClass + ")");
										i.lazy.loadInSlide(r.index(), !1)
									} else {
										var u = i.$wrapperEl.children("." + i.params.slideDuplicateClass + '[data-swiper-slide-index="' + e + '"]');
										i.lazy.loadInSlide(u.index(), !1)
									}
								}
								i.emit("lazyImageReady", a[0], o[0]), i.params.autoHeight && i.updateAutoHeight()
							}
						})), i.emit("lazyImageLoad", a[0], o[0])
					}))
				}
			},
			load: function () {
				var e = this,
					t = e.$wrapperEl,
					i = e.params,
					s = e.slides,
					a = e.activeIndex,
					r = e.virtual && i.virtual.enabled,
					o = i.lazy,
					l = i.slidesPerView;

				function d(e) {
					if (r) {
						if (t.children("." + i.slideClass + '[data-swiper-slide-index="' + e + '"]').length) return !0
					} else if (s[e]) return !0;
					return !1
				}

				function h(e) {
					return r ? n(e).attr("data-swiper-slide-index") : n(e).index()
				}
				if ("auto" === l && (l = 0), e.lazy.initialImageLoaded || (e.lazy.initialImageLoaded = !0), e.params.watchSlidesVisibility) t.children("." + i.slideVisibleClass).each((function (t, i) {
					var s = r ? n(i).attr("data-swiper-slide-index") : n(i).index();
					e.lazy.loadInSlide(s)
				}));
				else if (l > 1)
					for (var p = a; p < a + l; p += 1) d(p) && e.lazy.loadInSlide(p);
				else e.lazy.loadInSlide(a);
				if (o.loadPrevNext)
					if (l > 1 || o.loadPrevNextAmount && o.loadPrevNextAmount > 1) {
						for (var c = o.loadPrevNextAmount, u = l, v = Math.min(a + u + Math.max(c, u), s.length), f = Math.max(a - Math.max(u, c), 0), m = a + l; m < v; m += 1) d(m) && e.lazy.loadInSlide(m);
						for (var g = f; g < a; g += 1) d(g) && e.lazy.loadInSlide(g)
					} else {
						var b = t.children("." + i.slideNextClass);
						b.length > 0 && e.lazy.loadInSlide(h(b));
						var w = t.children("." + i.slidePrevClass);
						w.length > 0 && e.lazy.loadInSlide(h(w))
					}
			}
		},
		ce = {
			LinearSpline: function (e, t) {
				var i, s, a, r, n, o = function (e, t) {
					for (s = -1, i = e.length; i - s > 1;) e[a = i + s >> 1] <= t ? s = a : i = a;
					return i
				};
				return this.x = e, this.y = t, this.lastIndex = e.length - 1, this.interpolate = function (e) {
					return e ? (n = o(this.x, e), r = n - 1, (e - this.x[r]) * (this.y[n] - this.y[r]) / (this.x[n] - this.x[r]) + this.y[r]) : 0
				}, this
			},
			getInterpolateFunction: function (e) {
				this.controller.spline || (this.controller.spline = this.params.loop ? new ce.LinearSpline(this.slidesGrid, e.slidesGrid) : new ce.LinearSpline(this.snapGrid, e.snapGrid))
			},
			setTranslate: function (e, t) {
				var i, s, a = this,
					r = a.controller.control;

				function n(e) {
					var t = a.rtlTranslate ? -a.translate : a.translate;
					"slide" === a.params.controller.by && (a.controller.getInterpolateFunction(e), s = -a.controller.spline.interpolate(-t)), s && "container" !== a.params.controller.by || (i = (e.maxTranslate() - e.minTranslate()) / (a.maxTranslate() - a.minTranslate()), s = (t - a.minTranslate()) * i + e.minTranslate()), a.params.controller.inverse && (s = e.maxTranslate() - s), e.updateProgress(s), e.setTranslate(s, a), e.updateActiveIndex(), e.updateSlidesClasses()
				}
				if (Array.isArray(r))
					for (var o = 0; o < r.length; o += 1) r[o] !== t && r[o] instanceof j && n(r[o]);
				else r instanceof j && t !== r && n(r)
			},
			setTransition: function (e, t) {
				var i, s = this,
					a = s.controller.control;

				function r(t) {
					t.setTransition(e, s), 0 !== e && (t.transitionStart(), t.params.autoHeight && d.nextTick((function () {
						t.updateAutoHeight()
					})), t.$wrapperEl.transitionEnd((function () {
						a && (t.params.loop && "slide" === s.params.controller.by && t.loopFix(), t.transitionEnd())
					})))
				}
				if (Array.isArray(a))
					for (i = 0; i < a.length; i += 1) a[i] !== t && a[i] instanceof j && r(a[i]);
				else a instanceof j && t !== a && r(a)
			}
		},
		ue = {
			makeElFocusable: function (e) {
				return e.attr("tabIndex", "0"), e
			},
			makeElNotFocusable: function (e) {
				return e.attr("tabIndex", "-1"), e
			},
			addElRole: function (e, t) {
				return e.attr("role", t), e
			},
			addElLabel: function (e, t) {
				return e.attr("aria-label", t), e
			},
			disableEl: function (e) {
				return e.attr("aria-disabled", !0), e
			},
			enableEl: function (e) {
				return e.attr("aria-disabled", !1), e
			},
			onEnterKey: function (e) {
				var t = this.params.a11y;
				if (13 === e.keyCode) {
					var i = n(e.target);
					this.navigation && this.navigation.$nextEl && i.is(this.navigation.$nextEl) && (this.isEnd && !this.params.loop || this.slideNext(), this.isEnd ? this.a11y.notify(t.lastSlideMessage) : this.a11y.notify(t.nextSlideMessage)), this.navigation && this.navigation.$prevEl && i.is(this.navigation.$prevEl) && (this.isBeginning && !this.params.loop || this.slidePrev(), this.isBeginning ? this.a11y.notify(t.firstSlideMessage) : this.a11y.notify(t.prevSlideMessage)), this.pagination && i.is("." + this.params.pagination.bulletClass) && i[0].click()
				}
			},
			notify: function (e) {
				var t = this.a11y.liveRegion;
				0 !== t.length && (t.html(""), t.html(e))
			},
			updateNavigation: function () {
				if (!this.params.loop && this.navigation) {
					var e = this.navigation,
						t = e.$nextEl,
						i = e.$prevEl;
					i && i.length > 0 && (this.isBeginning ? (this.a11y.disableEl(i), this.a11y.makeElNotFocusable(i)) : (this.a11y.enableEl(i), this.a11y.makeElFocusable(i))), t && t.length > 0 && (this.isEnd ? (this.a11y.disableEl(t), this.a11y.makeElNotFocusable(t)) : (this.a11y.enableEl(t), this.a11y.makeElFocusable(t)))
				}
			},
			updatePagination: function () {
				var e = this,
					t = e.params.a11y;
				e.pagination && e.params.pagination.clickable && e.pagination.bullets && e.pagination.bullets.length && e.pagination.bullets.each((function (i, s) {
					var a = n(s);
					e.a11y.makeElFocusable(a), e.a11y.addElRole(a, "button"), e.a11y.addElLabel(a, t.paginationBulletMessage.replace(/\{\{index\}\}/, a.index() + 1))
				}))
			},
			init: function () {
				this.$el.append(this.a11y.liveRegion);
				var e, t, i = this.params.a11y;
				this.navigation && this.navigation.$nextEl && (e = this.navigation.$nextEl), this.navigation && this.navigation.$prevEl && (t = this.navigation.$prevEl), e && (this.a11y.makeElFocusable(e), this.a11y.addElRole(e, "button"), this.a11y.addElLabel(e, i.nextSlideMessage), e.on("keydown", this.a11y.onEnterKey)), t && (this.a11y.makeElFocusable(t), this.a11y.addElRole(t, "button"), this.a11y.addElLabel(t, i.prevSlideMessage), t.on("keydown", this.a11y.onEnterKey)), this.pagination && this.params.pagination.clickable && this.pagination.bullets && this.pagination.bullets.length && this.pagination.$el.on("keydown", "." + this.params.pagination.bulletClass, this.a11y.onEnterKey)
			},
			destroy: function () {
				var e, t;
				this.a11y.liveRegion && this.a11y.liveRegion.length > 0 && this.a11y.liveRegion.remove(), this.navigation && this.navigation.$nextEl && (e = this.navigation.$nextEl), this.navigation && this.navigation.$prevEl && (t = this.navigation.$prevEl), e && e.off("keydown", this.a11y.onEnterKey), t && t.off("keydown", this.a11y.onEnterKey), this.pagination && this.params.pagination.clickable && this.pagination.bullets && this.pagination.bullets.length && this.pagination.$el.off("keydown", "." + this.params.pagination.bulletClass, this.a11y.onEnterKey)
			}
		},
		ve = {
			init: function () {
				if (this.params.history) {
					if (!a.history || !a.history.pushState) return this.params.history.enabled = !1, void(this.params.hashNavigation.enabled = !0);
					var e = this.history;
					e.initialized = !0, e.paths = ve.getPathValues(), (e.paths.key || e.paths.value) && (e.scrollToSlide(0, e.paths.value, this.params.runCallbacksOnInit), this.params.history.replaceState || a.addEventListener("popstate", this.history.setHistoryPopState))
				}
			},
			destroy: function () {
				this.params.history.replaceState || a.removeEventListener("popstate", this.history.setHistoryPopState)
			},
			setHistoryPopState: function () {
				this.history.paths = ve.getPathValues(), this.history.scrollToSlide(this.params.speed, this.history.paths.value, !1)
			},
			getPathValues: function () {
				var e = a.location.pathname.slice(1).split("/").filter((function (e) {
						return "" !== e
					})),
					t = e.length;
				return {
					key: e[t - 2],
					value: e[t - 1]
				}
			},
			setHistory: function (e, t) {
				if (this.history.initialized && this.params.history.enabled) {
					var i = this.slides.eq(t),
						s = ve.slugify(i.attr("data-history"));
					a.location.pathname.includes(e) || (s = e + "/" + s);
					var r = a.history.state;
					r && r.value === s || (this.params.history.replaceState ? a.history.replaceState({
						value: s
					}, null, s) : a.history.pushState({
						value: s
					}, null, s))
				}
			},
			slugify: function (e) {
				return e.toString().replace(/\s+/g, "-").replace(/[^\w-]+/g, "").replace(/--+/g, "-").replace(/^-+/, "").replace(/-+$/, "")
			},
			scrollToSlide: function (e, t, i) {
				if (t)
					for (var s = 0, a = this.slides.length; s < a; s += 1) {
						var r = this.slides.eq(s);
						if (ve.slugify(r.attr("data-history")) === t && !r.hasClass(this.params.slideDuplicateClass)) {
							var n = r.index();
							this.slideTo(n, e, i)
						}
					} else this.slideTo(0, e, i)
			}
		},
		fe = {
			onHashCange: function () {
				this.emit("hashChange");
				var e = i.location.hash.replace("#", "");
				if (e !== this.slides.eq(this.activeIndex).attr("data-hash")) {
					var t = this.$wrapperEl.children("." + this.params.slideClass + '[data-hash="' + e + '"]').index();
					if (void 0 === t) return;
					this.slideTo(t)
				}
			},
			setHash: function () {
				if (this.hashNavigation.initialized && this.params.hashNavigation.enabled)
					if (this.params.hashNavigation.replaceState && a.history && a.history.replaceState) a.history.replaceState(null, null, "#" + this.slides.eq(this.activeIndex).attr("data-hash") || ""), this.emit("hashSet");
					else {
						var e = this.slides.eq(this.activeIndex),
							t = e.attr("data-hash") || e.attr("data-history");
						i.location.hash = t || "", this.emit("hashSet")
					}
			},
			init: function () {
				if (!(!this.params.hashNavigation.enabled || this.params.history && this.params.history.enabled)) {
					this.hashNavigation.initialized = !0;
					var e = i.location.hash.replace("#", "");
					if (e)
						for (var t = 0, s = this.slides.length; t < s; t += 1) {
							var r = this.slides.eq(t);
							if ((r.attr("data-hash") || r.attr("data-history")) === e && !r.hasClass(this.params.slideDuplicateClass)) {
								var o = r.index();
								this.slideTo(o, 0, this.params.runCallbacksOnInit, !0)
							}
						}
					this.params.hashNavigation.watchState && n(a).on("hashchange", this.hashNavigation.onHashCange)
				}
			},
			destroy: function () {
				this.params.hashNavigation.watchState && n(a).off("hashchange", this.hashNavigation.onHashCange)
			}
		},
		me = {
			run: function () {
				var e = this,
					t = e.slides.eq(e.activeIndex),
					i = e.params.autoplay.delay;
				t.attr("data-swiper-autoplay") && (i = t.attr("data-swiper-autoplay") || e.params.autoplay.delay), clearTimeout(e.autoplay.timeout), e.autoplay.timeout = d.nextTick((function () {
					e.params.autoplay.reverseDirection ? e.params.loop ? (e.loopFix(), e.slidePrev(e.params.speed, !0, !0), e.emit("autoplay")) : e.isBeginning ? e.params.autoplay.stopOnLastSlide ? e.autoplay.stop() : (e.slideTo(e.slides.length - 1, e.params.speed, !0, !0), e.emit("autoplay")) : (e.slidePrev(e.params.speed, !0, !0), e.emit("autoplay")) : e.params.loop ? (e.loopFix(), e.slideNext(e.params.speed, !0, !0), e.emit("autoplay")) : e.isEnd ? e.params.autoplay.stopOnLastSlide ? e.autoplay.stop() : (e.slideTo(0, e.params.speed, !0, !0), e.emit("autoplay")) : (e.slideNext(e.params.speed, !0, !0), e.emit("autoplay")), e.params.cssMode && e.autoplay.running && e.autoplay.run()
				}), i)
			},
			start: function () {
				return void 0 === this.autoplay.timeout && (!this.autoplay.running && (this.autoplay.running = !0, this.emit("autoplayStart"), this.autoplay.run(), !0))
			},
			stop: function () {
				return !!this.autoplay.running && (void 0 !== this.autoplay.timeout && (this.autoplay.timeout && (clearTimeout(this.autoplay.timeout), this.autoplay.timeout = void 0), this.autoplay.running = !1, this.emit("autoplayStop"), !0))
			},
			pause: function (e) {
				this.autoplay.running && (this.autoplay.paused || (this.autoplay.timeout && clearTimeout(this.autoplay.timeout), this.autoplay.paused = !0, 0 !== e && this.params.autoplay.waitForTransition ? (this.$wrapperEl[0].addEventListener("transitionend", this.autoplay.onTransitionEnd), this.$wrapperEl[0].addEventListener("webkitTransitionEnd", this.autoplay.onTransitionEnd)) : (this.autoplay.paused = !1, this.autoplay.run())))
			}
		},
		ge = {
			setTranslate: function () {
				for (var e = this.slides, t = 0; t < e.length; t += 1) {
					var i = this.slides.eq(t),
						s = -i[0].swiperSlideOffset;
					this.params.virtualTranslate || (s -= this.translate);
					var a = 0;
					this.isHorizontal() || (a = s, s = 0);
					var r = this.params.fadeEffect.crossFade ? Math.max(1 - Math.abs(i[0].progress), 0) : 1 + Math.min(Math.max(i[0].progress, -1), 0);
					i.css({
						opacity: r
					}).transform("translate3d(" + s + "px, " + a + "px, 0px)")
				}
			},
			setTransition: function (e) {
				var t = this,
					i = t.slides,
					s = t.$wrapperEl;
				if (i.transition(e), t.params.virtualTranslate && 0 !== e) {
					var a = !1;
					i.transitionEnd((function () {
						if (!a && t && !t.destroyed) {
							a = !0, t.animating = !1;
							for (var e = ["webkitTransitionEnd", "transitionend"], i = 0; i < e.length; i += 1) s.trigger(e[i])
						}
					}))
				}
			}
		},
		be = {
			setTranslate: function () {
				var e, t = this.$el,
					i = this.$wrapperEl,
					s = this.slides,
					a = this.width,
					r = this.height,
					o = this.rtlTranslate,
					l = this.size,
					d = this.params.cubeEffect,
					h = this.isHorizontal(),
					p = this.virtual && this.params.virtual.enabled,
					c = 0;
				d.shadow && (h ? (0 === (e = i.find(".swiper-cube-shadow")).length && (e = n('<div class="swiper-cube-shadow"></div>'), i.append(e)), e.css({
					height: a + "px"
				})) : 0 === (e = t.find(".swiper-cube-shadow")).length && (e = n('<div class="swiper-cube-shadow"></div>'), t.append(e)));
				for (var u = 0; u < s.length; u += 1) {
					var v = s.eq(u),
						f = u;
					p && (f = parseInt(v.attr("data-swiper-slide-index"), 10));
					var m = 90 * f,
						g = Math.floor(m / 360);
					o && (m = -m, g = Math.floor(-m / 360));
					var b = Math.max(Math.min(v[0].progress, 1), -1),
						w = 0,
						y = 0,
						x = 0;
					f % 4 == 0 ? (w = 4 * -g * l, x = 0) : (f - 1) % 4 == 0 ? (w = 0, x = 4 * -g * l) : (f - 2) % 4 == 0 ? (w = l + 4 * g * l, x = l) : (f - 3) % 4 == 0 && (w = -l, x = 3 * l + 4 * l * g), o && (w = -w), h || (y = w, w = 0);
					var E = "rotateX(" + (h ? 0 : -m) + "deg) rotateY(" + (h ? m : 0) + "deg) translate3d(" + w + "px, " + y + "px, " + x + "px)";
					if (b <= 1 && b > -1 && (c = 90 * f + 90 * b, o && (c = 90 * -f - 90 * b)), v.transform(E), d.slideShadows) {
						var T = h ? v.find(".swiper-slide-shadow-left") : v.find(".swiper-slide-shadow-top"),
							S = h ? v.find(".swiper-slide-shadow-right") : v.find(".swiper-slide-shadow-bottom");
						0 === T.length && (T = n('<div class="swiper-slide-shadow-' + (h ? "left" : "top") + '"></div>'), v.append(T)), 0 === S.length && (S = n('<div class="swiper-slide-shadow-' + (h ? "right" : "bottom") + '"></div>'), v.append(S)), T.length && (T[0].style.opacity = Math.max(-b, 0)), S.length && (S[0].style.opacity = Math.max(b, 0))
					}
				}
				if (i.css({
						"-webkit-transform-origin": "50% 50% -" + l / 2 + "px",
						"-moz-transform-origin": "50% 50% -" + l / 2 + "px",
						"-ms-transform-origin": "50% 50% -" + l / 2 + "px",
						"transform-origin": "50% 50% -" + l / 2 + "px"
					}), d.shadow)
					if (h) e.transform("translate3d(0px, " + (a / 2 + d.shadowOffset) + "px, " + -a / 2 + "px) rotateX(90deg) rotateZ(0deg) scale(" + d.shadowScale + ")");
					else {
						var C = Math.abs(c) - 90 * Math.floor(Math.abs(c) / 90),
							M = 1.5 - (Math.sin(2 * C * Math.PI / 360) / 2 + Math.cos(2 * C * Math.PI / 360) / 2),
							P = d.shadowScale,
							z = d.shadowScale / M,
							k = d.shadowOffset;
						e.transform("scale3d(" + P + ", 1, " + z + ") translate3d(0px, " + (r / 2 + k) + "px, " + -r / 2 / z + "px) rotateX(-90deg)")
					}
				var $ = _.isSafari || _.isWebView ? -l / 2 : 0;
				i.transform("translate3d(0px,0," + $ + "px) rotateX(" + (this.isHorizontal() ? 0 : c) + "deg) rotateY(" + (this.isHorizontal() ? -c : 0) + "deg)")
			},
			setTransition: function (e) {
				var t = this.$el;
				this.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), this.params.cubeEffect.shadow && !this.isHorizontal() && t.find(".swiper-cube-shadow").transition(e)
			}
		},
		we = {
			setTranslate: function () {
				for (var e = this.slides, t = this.rtlTranslate, i = 0; i < e.length; i += 1) {
					var s = e.eq(i),
						a = s[0].progress;
					this.params.flipEffect.limitRotation && (a = Math.max(Math.min(s[0].progress, 1), -1));
					var r = -180 * a,
						o = 0,
						l = -s[0].swiperSlideOffset,
						d = 0;
					if (this.isHorizontal() ? t && (r = -r) : (d = l, l = 0, o = -r, r = 0), s[0].style.zIndex = -Math.abs(Math.round(a)) + e.length, this.params.flipEffect.slideShadows) {
						var h = this.isHorizontal() ? s.find(".swiper-slide-shadow-left") : s.find(".swiper-slide-shadow-top"),
							p = this.isHorizontal() ? s.find(".swiper-slide-shadow-right") : s.find(".swiper-slide-shadow-bottom");
						0 === h.length && (h = n('<div class="swiper-slide-shadow-' + (this.isHorizontal() ? "left" : "top") + '"></div>'), s.append(h)), 0 === p.length && (p = n('<div class="swiper-slide-shadow-' + (this.isHorizontal() ? "right" : "bottom") + '"></div>'), s.append(p)), h.length && (h[0].style.opacity = Math.max(-a, 0)), p.length && (p[0].style.opacity = Math.max(a, 0))
					}
					s.transform("translate3d(" + l + "px, " + d + "px, 0px) rotateX(" + o + "deg) rotateY(" + r + "deg)")
				}
			},
			setTransition: function (e) {
				var t = this,
					i = t.slides,
					s = t.activeIndex,
					a = t.$wrapperEl;
				if (i.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e), t.params.virtualTranslate && 0 !== e) {
					var r = !1;
					i.eq(s).transitionEnd((function () {
						if (!r && t && !t.destroyed) {
							r = !0, t.animating = !1;
							for (var e = ["webkitTransitionEnd", "transitionend"], i = 0; i < e.length; i += 1) a.trigger(e[i])
						}
					}))
				}
			}
		},
		ye = {
			setTranslate: function () {
				for (var e = this.width, t = this.height, i = this.slides, s = this.$wrapperEl, a = this.slidesSizesGrid, r = this.params.coverflowEffect, o = this.isHorizontal(), l = this.translate, d = o ? e / 2 - l : t / 2 - l, p = o ? r.rotate : -r.rotate, c = r.depth, u = 0, v = i.length; u < v; u += 1) {
					var f = i.eq(u),
						m = a[u],
						g = (d - f[0].swiperSlideOffset - m / 2) / m * r.modifier,
						b = o ? p * g : 0,
						w = o ? 0 : p * g,
						y = -c * Math.abs(g),
						x = r.stretch;
					"string" == typeof x && -1 !== x.indexOf("%") && (x = parseFloat(r.stretch) / 100 * m);
					var E = o ? 0 : x * g,
						T = o ? x * g : 0,
						S = 1 - (1 - r.scale) * Math.abs(g);
					Math.abs(T) < .001 && (T = 0), Math.abs(E) < .001 && (E = 0), Math.abs(y) < .001 && (y = 0), Math.abs(b) < .001 && (b = 0), Math.abs(w) < .001 && (w = 0), Math.abs(S) < .001 && (S = 0);
					var C = "translate3d(" + T + "px," + E + "px," + y + "px)  rotateX(" + w + "deg) rotateY(" + b + "deg) scale(" + S + ")";
					if (f.transform(C), f[0].style.zIndex = 1 - Math.abs(Math.round(g)), r.slideShadows) {
						var M = o ? f.find(".swiper-slide-shadow-left") : f.find(".swiper-slide-shadow-top"),
							P = o ? f.find(".swiper-slide-shadow-right") : f.find(".swiper-slide-shadow-bottom");
						0 === M.length && (M = n('<div class="swiper-slide-shadow-' + (o ? "left" : "top") + '"></div>'), f.append(M)), 0 === P.length && (P = n('<div class="swiper-slide-shadow-' + (o ? "right" : "bottom") + '"></div>'), f.append(P)), M.length && (M[0].style.opacity = g > 0 ? g : 0), P.length && (P[0].style.opacity = -g > 0 ? -g : 0)
					}
				}(h.pointerEvents || h.prefixedPointerEvents) && (s[0].style.perspectiveOrigin = d + "px 50%")
			},
			setTransition: function (e) {
				this.slides.transition(e).find(".swiper-slide-shadow-top, .swiper-slide-shadow-right, .swiper-slide-shadow-bottom, .swiper-slide-shadow-left").transition(e)
			}
		},
		xe = {
			init: function () {
				var e = this.params.thumbs,
					t = this.constructor;
				e.swiper instanceof t ? (this.thumbs.swiper = e.swiper, d.extend(this.thumbs.swiper.originalParams, {
					watchSlidesProgress: !0,
					slideToClickedSlide: !1
				}), d.extend(this.thumbs.swiper.params, {
					watchSlidesProgress: !0,
					slideToClickedSlide: !1
				})) : d.isObject(e.swiper) && (this.thumbs.swiper = new t(d.extend({}, e.swiper, {
					watchSlidesVisibility: !0,
					watchSlidesProgress: !0,
					slideToClickedSlide: !1
				})), this.thumbs.swiperCreated = !0), this.thumbs.swiper.$el.addClass(this.params.thumbs.thumbsContainerClass), this.thumbs.swiper.on("tap", this.thumbs.onThumbClick)
			},
			onThumbClick: function () {
				var e = this.thumbs.swiper;
				if (e) {
					var t = e.clickedIndex,
						i = e.clickedSlide;
					if (!(i && n(i).hasClass(this.params.thumbs.slideThumbActiveClass) || null == t)) {
						var s;
						if (s = e.params.loop ? parseInt(n(e.clickedSlide).attr("data-swiper-slide-index"), 10) : t, this.params.loop) {
							var a = this.activeIndex;
							this.slides.eq(a).hasClass(this.params.slideDuplicateClass) && (this.loopFix(), this._clientLeft = this.$wrapperEl[0].clientLeft, a = this.activeIndex);
							var r = this.slides.eq(a).prevAll('[data-swiper-slide-index="' + s + '"]').eq(0).index(),
								o = this.slides.eq(a).nextAll('[data-swiper-slide-index="' + s + '"]').eq(0).index();
							s = void 0 === r ? o : void 0 === o ? r : o - a < a - r ? o : r
						}
						this.slideTo(s)
					}
				}
			},
			update: function (e) {
				var t = this.thumbs.swiper;
				if (t) {
					var i = "auto" === t.params.slidesPerView ? t.slidesPerViewDynamic() : t.params.slidesPerView,
						s = this.params.thumbs.autoScrollOffset,
						a = s && !t.params.loop;
					if (this.realIndex !== t.realIndex || a) {
						var r, n, o = t.activeIndex;
						if (t.params.loop) {
							t.slides.eq(o).hasClass(t.params.slideDuplicateClass) && (t.loopFix(), t._clientLeft = t.$wrapperEl[0].clientLeft, o = t.activeIndex);
							var l = t.slides.eq(o).prevAll('[data-swiper-slide-index="' + this.realIndex + '"]').eq(0).index(),
								d = t.slides.eq(o).nextAll('[data-swiper-slide-index="' + this.realIndex + '"]').eq(0).index();
							r = void 0 === l ? d : void 0 === d ? l : d - o == o - l ? o : d - o < o - l ? d : l, n = this.activeIndex > this.previousIndex ? "next" : "prev"
						} else n = (r = this.realIndex) > this.previousIndex ? "next" : "prev";
						a && (r += "next" === n ? s : -1 * s), t.visibleSlidesIndexes && t.visibleSlidesIndexes.indexOf(r) < 0 && (t.params.centeredSlides ? r = r > o ? r - Math.floor(i / 2) + 1 : r + Math.floor(i / 2) - 1 : r > o && (r = r - i + 1), t.slideTo(r, e ? 0 : void 0))
					}
					var h = 1,
						p = this.params.thumbs.slideThumbActiveClass;
					if (this.params.slidesPerView > 1 && !this.params.centeredSlides && (h = this.params.slidesPerView), this.params.thumbs.multipleActiveThumbs || (h = 1), h = Math.floor(h), t.slides.removeClass(p), t.params.loop || t.params.virtual && t.params.virtual.enabled)
						for (var c = 0; c < h; c += 1) t.$wrapperEl.children('[data-swiper-slide-index="' + (this.realIndex + c) + '"]').addClass(p);
					else
						for (var u = 0; u < h; u += 1) t.slides.eq(this.realIndex + u).addClass(p)
				}
			}
		},
		Ee = [K, U, Z, Q, ee, ie, ae, {
			name: "mousewheel",
			params: {
				mousewheel: {
					enabled: !1,
					releaseOnEdges: !1,
					invert: !1,
					forceToAxis: !1,
					sensitivity: 1,
					eventsTarged: "container"
				}
			},
			create: function () {
				d.extend(this, {
					mousewheel: {
						enabled: !1,
						enable: re.enable.bind(this),
						disable: re.disable.bind(this),
						handle: re.handle.bind(this),
						handleMouseEnter: re.handleMouseEnter.bind(this),
						handleMouseLeave: re.handleMouseLeave.bind(this),
						animateSlider: re.animateSlider.bind(this),
						releaseScroll: re.releaseScroll.bind(this),
						lastScrollTime: d.now(),
						lastEventBeforeSnap: void 0,
						recentWheelEvents: []
					}
				})
			},
			on: {
				init: function () {
					!this.params.mousewheel.enabled && this.params.cssMode && this.mousewheel.disable(), this.params.mousewheel.enabled && this.mousewheel.enable()
				},
				destroy: function () {
					this.params.cssMode && this.mousewheel.enable(), this.mousewheel.enabled && this.mousewheel.disable()
				}
			}
		}, {
			name: "navigation",
			params: {
				navigation: {
					nextEl: null,
					prevEl: null,
					hideOnClick: !1,
					disabledClass: "swiper-button-disabled",
					hiddenClass: "swiper-button-hidden",
					lockClass: "swiper-button-lock"
				}
			},
			create: function () {
				d.extend(this, {
					navigation: {
						init: ne.init.bind(this),
						update: ne.update.bind(this),
						destroy: ne.destroy.bind(this),
						onNextClick: ne.onNextClick.bind(this),
						onPrevClick: ne.onPrevClick.bind(this)
					}
				})
			},
			on: {
				init: function () {
					this.navigation.init(), this.navigation.update()
				},
				toEdge: function () {
					this.navigation.update()
				},
				fromEdge: function () {
					this.navigation.update()
				},
				destroy: function () {
					this.navigation.destroy()
				},
				click: function (e) {
					var t, i = this.navigation,
						s = i.$nextEl,
						a = i.$prevEl;
					!this.params.navigation.hideOnClick || n(e.target).is(a) || n(e.target).is(s) || (s ? t = s.hasClass(this.params.navigation.hiddenClass) : a && (t = a.hasClass(this.params.navigation.hiddenClass)), !0 === t ? this.emit("navigationShow", this) : this.emit("navigationHide", this), s && s.toggleClass(this.params.navigation.hiddenClass), a && a.toggleClass(this.params.navigation.hiddenClass))
				}
			}
		}, {
			name: "pagination",
			params: {
				pagination: {
					el: null,
					bulletElement: "span",
					clickable: !1,
					hideOnClick: !1,
					renderBullet: null,
					renderProgressbar: null,
					renderFraction: null,
					renderCustom: null,
					progressbarOpposite: !1,
					type: "bullets",
					dynamicBullets: !1,
					dynamicMainBullets: 1,
					formatFractionCurrent: function (e) {
						return e
					},
					formatFractionTotal: function (e) {
						return e
					},
					bulletClass: "swiper-pagination-bullet",
					bulletActiveClass: "swiper-pagination-bullet-active",
					modifierClass: "swiper-pagination-",
					currentClass: "swiper-pagination-current",
					totalClass: "swiper-pagination-total",
					hiddenClass: "swiper-pagination-hidden",
					progressbarFillClass: "swiper-pagination-progressbar-fill",
					progressbarOppositeClass: "swiper-pagination-progressbar-opposite",
					clickableClass: "swiper-pagination-clickable",
					lockClass: "swiper-pagination-lock"
				}
			},
			create: function () {
				d.extend(this, {
					pagination: {
						init: oe.init.bind(this),
						render: oe.render.bind(this),
						update: oe.update.bind(this),
						destroy: oe.destroy.bind(this),
						dynamicBulletIndex: 0
					}
				})
			},
			on: {
				init: function () {
					this.pagination.init(), this.pagination.render(), this.pagination.update()
				},
				activeIndexChange: function () {
					(this.params.loop || void 0 === this.snapIndex) && this.pagination.update()
				},
				snapIndexChange: function () {
					this.params.loop || this.pagination.update()
				},
				slidesLengthChange: function () {
					this.params.loop && (this.pagination.render(), this.pagination.update())
				},
				snapGridLengthChange: function () {
					this.params.loop || (this.pagination.render(), this.pagination.update())
				},
				destroy: function () {
					this.pagination.destroy()
				},
				click: function (e) {
					this.params.pagination.el && this.params.pagination.hideOnClick && this.pagination.$el.length > 0 && !n(e.target).hasClass(this.params.pagination.bulletClass) && (!0 === this.pagination.$el.hasClass(this.params.pagination.hiddenClass) ? this.emit("paginationShow", this) : this.emit("paginationHide", this), this.pagination.$el.toggleClass(this.params.pagination.hiddenClass))
				}
			}
		}, {
			name: "scrollbar",
			params: {
				scrollbar: {
					el: null,
					dragSize: "auto",
					hide: !1,
					draggable: !1,
					snapOnRelease: !0,
					lockClass: "swiper-scrollbar-lock",
					dragClass: "swiper-scrollbar-drag"
				}
			},
			create: function () {
				d.extend(this, {
					scrollbar: {
						init: le.init.bind(this),
						destroy: le.destroy.bind(this),
						updateSize: le.updateSize.bind(this),
						setTranslate: le.setTranslate.bind(this),
						setTransition: le.setTransition.bind(this),
						enableDraggable: le.enableDraggable.bind(this),
						disableDraggable: le.disableDraggable.bind(this),
						setDragPosition: le.setDragPosition.bind(this),
						getPointerPosition: le.getPointerPosition.bind(this),
						onDragStart: le.onDragStart.bind(this),
						onDragMove: le.onDragMove.bind(this),
						onDragEnd: le.onDragEnd.bind(this),
						isTouched: !1,
						timeout: null,
						dragTimeout: null
					}
				})
			},
			on: {
				init: function () {
					this.scrollbar.init(), this.scrollbar.updateSize(), this.scrollbar.setTranslate()
				},
				update: function () {
					this.scrollbar.updateSize()
				},
				resize: function () {
					this.scrollbar.updateSize()
				},
				observerUpdate: function () {
					this.scrollbar.updateSize()
				},
				setTranslate: function () {
					this.scrollbar.setTranslate()
				},
				setTransition: function (e) {
					this.scrollbar.setTransition(e)
				},
				destroy: function () {
					this.scrollbar.destroy()
				}
			}
		}, {
			name: "parallax",
			params: {
				parallax: {
					enabled: !1
				}
			},
			create: function () {
				d.extend(this, {
					parallax: {
						setTransform: de.setTransform.bind(this),
						setTranslate: de.setTranslate.bind(this),
						setTransition: de.setTransition.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					this.params.parallax.enabled && (this.params.watchSlidesProgress = !0, this.originalParams.watchSlidesProgress = !0)
				},
				init: function () {
					this.params.parallax.enabled && this.parallax.setTranslate()
				},
				setTranslate: function () {
					this.params.parallax.enabled && this.parallax.setTranslate()
				},
				setTransition: function (e) {
					this.params.parallax.enabled && this.parallax.setTransition(e)
				}
			}
		}, {
			name: "zoom",
			params: {
				zoom: {
					enabled: !1,
					maxRatio: 3,
					minRatio: 1,
					toggle: !0,
					containerClass: "swiper-zoom-container",
					zoomedSlideClass: "swiper-slide-zoomed"
				}
			},
			create: function () {
				var e = this,
					t = {
						enabled: !1,
						scale: 1,
						currentScale: 1,
						isScaling: !1,
						gesture: {
							$slideEl: void 0,
							slideWidth: void 0,
							slideHeight: void 0,
							$imageEl: void 0,
							$imageWrapEl: void 0,
							maxRatio: 3
						},
						image: {
							isTouched: void 0,
							isMoved: void 0,
							currentX: void 0,
							currentY: void 0,
							minX: void 0,
							minY: void 0,
							maxX: void 0,
							maxY: void 0,
							width: void 0,
							height: void 0,
							startX: void 0,
							startY: void 0,
							touchesStart: {},
							touchesCurrent: {}
						},
						velocity: {
							x: void 0,
							y: void 0,
							prevPositionX: void 0,
							prevPositionY: void 0,
							prevTime: void 0
						}
					};
				"onGestureStart onGestureChange onGestureEnd onTouchStart onTouchMove onTouchEnd onTransitionEnd toggle enable disable in out".split(" ").forEach((function (i) {
					t[i] = he[i].bind(e)
				})), d.extend(e, {
					zoom: t
				});
				var i = 1;
				Object.defineProperty(e.zoom, "scale", {
					get: function () {
						return i
					},
					set: function (t) {
						if (i !== t) {
							var s = e.zoom.gesture.$imageEl ? e.zoom.gesture.$imageEl[0] : void 0,
								a = e.zoom.gesture.$slideEl ? e.zoom.gesture.$slideEl[0] : void 0;
							e.emit("zoomChange", t, s, a)
						}
						i = t
					}
				})
			},
			on: {
				init: function () {
					this.params.zoom.enabled && this.zoom.enable()
				},
				destroy: function () {
					this.zoom.disable()
				},
				touchStart: function (e) {
					this.zoom.enabled && this.zoom.onTouchStart(e)
				},
				touchEnd: function (e) {
					this.zoom.enabled && this.zoom.onTouchEnd(e)
				},
				doubleTap: function (e) {
					this.params.zoom.enabled && this.zoom.enabled && this.params.zoom.toggle && this.zoom.toggle(e)
				},
				transitionEnd: function () {
					this.zoom.enabled && this.params.zoom.enabled && this.zoom.onTransitionEnd()
				},
				slideChange: function () {
					this.zoom.enabled && this.params.zoom.enabled && this.params.cssMode && this.zoom.onTransitionEnd()
				}
			}
		}, {
			name: "lazy",
			params: {
				lazy: {
					enabled: !1,
					loadPrevNext: !1,
					loadPrevNextAmount: 1,
					loadOnTransitionStart: !1,
					elementClass: "swiper-lazy",
					loadingClass: "swiper-lazy-loading",
					loadedClass: "swiper-lazy-loaded",
					preloaderClass: "swiper-lazy-preloader"
				}
			},
			create: function () {
				d.extend(this, {
					lazy: {
						initialImageLoaded: !1,
						load: pe.load.bind(this),
						loadInSlide: pe.loadInSlide.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					this.params.lazy.enabled && this.params.preloadImages && (this.params.preloadImages = !1)
				},
				init: function () {
					this.params.lazy.enabled && !this.params.loop && 0 === this.params.initialSlide && this.lazy.load()
				},
				scroll: function () {
					this.params.freeMode && !this.params.freeModeSticky && this.lazy.load()
				},
				resize: function () {
					this.params.lazy.enabled && this.lazy.load()
				},
				scrollbarDragMove: function () {
					this.params.lazy.enabled && this.lazy.load()
				},
				transitionStart: function () {
					this.params.lazy.enabled && (this.params.lazy.loadOnTransitionStart || !this.params.lazy.loadOnTransitionStart && !this.lazy.initialImageLoaded) && this.lazy.load()
				},
				transitionEnd: function () {
					this.params.lazy.enabled && !this.params.lazy.loadOnTransitionStart && this.lazy.load()
				},
				slideChange: function () {
					this.params.lazy.enabled && this.params.cssMode && this.lazy.load()
				}
			}
		}, {
			name: "controller",
			params: {
				controller: {
					control: void 0,
					inverse: !1,
					by: "slide"
				}
			},
			create: function () {
				d.extend(this, {
					controller: {
						control: this.params.controller.control,
						getInterpolateFunction: ce.getInterpolateFunction.bind(this),
						setTranslate: ce.setTranslate.bind(this),
						setTransition: ce.setTransition.bind(this)
					}
				})
			},
			on: {
				update: function () {
					this.controller.control && this.controller.spline && (this.controller.spline = void 0, delete this.controller.spline)
				},
				resize: function () {
					this.controller.control && this.controller.spline && (this.controller.spline = void 0, delete this.controller.spline)
				},
				observerUpdate: function () {
					this.controller.control && this.controller.spline && (this.controller.spline = void 0, delete this.controller.spline)
				},
				setTranslate: function (e, t) {
					this.controller.control && this.controller.setTranslate(e, t)
				},
				setTransition: function (e, t) {
					this.controller.control && this.controller.setTransition(e, t)
				}
			}
		}, {
			name: "a11y",
			params: {
				a11y: {
					enabled: !0,
					notificationClass: "swiper-notification",
					prevSlideMessage: "Previous slide",
					nextSlideMessage: "Next slide",
					firstSlideMessage: "This is the first slide",
					lastSlideMessage: "This is the last slide",
					paginationBulletMessage: "Go to slide {{index}}"
				}
			},
			create: function () {
				var e = this;
				d.extend(e, {
					a11y: {
						liveRegion: n('<span class="' + e.params.a11y.notificationClass + '" aria-live="assertive" aria-atomic="true"></span>')
					}
				}), Object.keys(ue).forEach((function (t) {
					e.a11y[t] = ue[t].bind(e)
				}))
			},
			on: {
				init: function () {
					this.params.a11y.enabled && (this.a11y.init(), this.a11y.updateNavigation())
				},
				toEdge: function () {
					this.params.a11y.enabled && this.a11y.updateNavigation()
				},
				fromEdge: function () {
					this.params.a11y.enabled && this.a11y.updateNavigation()
				},
				paginationUpdate: function () {
					this.params.a11y.enabled && this.a11y.updatePagination()
				},
				destroy: function () {
					this.params.a11y.enabled && this.a11y.destroy()
				}
			}
		}, {
			name: "history",
			params: {
				history: {
					enabled: !1,
					replaceState: !1,
					key: "slides"
				}
			},
			create: function () {
				d.extend(this, {
					history: {
						init: ve.init.bind(this),
						setHistory: ve.setHistory.bind(this),
						setHistoryPopState: ve.setHistoryPopState.bind(this),
						scrollToSlide: ve.scrollToSlide.bind(this),
						destroy: ve.destroy.bind(this)
					}
				})
			},
			on: {
				init: function () {
					this.params.history.enabled && this.history.init()
				},
				destroy: function () {
					this.params.history.enabled && this.history.destroy()
				},
				transitionEnd: function () {
					this.history.initialized && this.history.setHistory(this.params.history.key, this.activeIndex)
				},
				slideChange: function () {
					this.history.initialized && this.params.cssMode && this.history.setHistory(this.params.history.key, this.activeIndex)
				}
			}
		}, {
			name: "hash-navigation",
			params: {
				hashNavigation: {
					enabled: !1,
					replaceState: !1,
					watchState: !1
				}
			},
			create: function () {
				d.extend(this, {
					hashNavigation: {
						initialized: !1,
						init: fe.init.bind(this),
						destroy: fe.destroy.bind(this),
						setHash: fe.setHash.bind(this),
						onHashCange: fe.onHashCange.bind(this)
					}
				})
			},
			on: {
				init: function () {
					this.params.hashNavigation.enabled && this.hashNavigation.init()
				},
				destroy: function () {
					this.params.hashNavigation.enabled && this.hashNavigation.destroy()
				},
				transitionEnd: function () {
					this.hashNavigation.initialized && this.hashNavigation.setHash()
				},
				slideChange: function () {
					this.hashNavigation.initialized && this.params.cssMode && this.hashNavigation.setHash()
				}
			}
		}, {
			name: "autoplay",
			params: {
				autoplay: {
					enabled: !1,
					delay: 3e3,
					waitForTransition: !0,
					disableOnInteraction: !0,
					stopOnLastSlide: !1,
					reverseDirection: !1
				}
			},
			create: function () {
				var e = this;
				d.extend(e, {
					autoplay: {
						running: !1,
						paused: !1,
						run: me.run.bind(e),
						start: me.start.bind(e),
						stop: me.stop.bind(e),
						pause: me.pause.bind(e),
						onVisibilityChange: function () {
							"hidden" === document.visibilityState && e.autoplay.running && e.autoplay.pause(), "visible" === document.visibilityState && e.autoplay.paused && (e.autoplay.run(), e.autoplay.paused = !1)
						},
						onTransitionEnd: function (t) {
							e && !e.destroyed && e.$wrapperEl && t.target === this && (e.$wrapperEl[0].removeEventListener("transitionend", e.autoplay.onTransitionEnd), e.$wrapperEl[0].removeEventListener("webkitTransitionEnd", e.autoplay.onTransitionEnd), e.autoplay.paused = !1, e.autoplay.running ? e.autoplay.run() : e.autoplay.stop())
						}
					}
				})
			},
			on: {
				init: function () {
					this.params.autoplay.enabled && (this.autoplay.start(), document.addEventListener("visibilitychange", this.autoplay.onVisibilityChange))
				},
				beforeTransitionStart: function (e, t) {
					this.autoplay.running && (t || !this.params.autoplay.disableOnInteraction ? this.autoplay.pause(e) : this.autoplay.stop())
				},
				sliderFirstMove: function () {
					this.autoplay.running && (this.params.autoplay.disableOnInteraction ? this.autoplay.stop() : this.autoplay.pause())
				},
				touchEnd: function () {
					this.params.cssMode && this.autoplay.paused && !this.params.autoplay.disableOnInteraction && this.autoplay.run()
				},
				destroy: function () {
					this.autoplay.running && this.autoplay.stop(), document.removeEventListener("visibilitychange", this.autoplay.onVisibilityChange)
				}
			}
		}, {
			name: "effect-fade",
			params: {
				fadeEffect: {
					crossFade: !1
				}
			},
			create: function () {
				d.extend(this, {
					fadeEffect: {
						setTranslate: ge.setTranslate.bind(this),
						setTransition: ge.setTransition.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					if ("fade" === this.params.effect) {
						this.classNames.push(this.params.containerModifierClass + "fade");
						var e = {
							slidesPerView: 1,
							slidesPerColumn: 1,
							slidesPerGroup: 1,
							watchSlidesProgress: !0,
							spaceBetween: 0,
							virtualTranslate: !0
						};
						d.extend(this.params, e), d.extend(this.originalParams, e)
					}
				},
				setTranslate: function () {
					"fade" === this.params.effect && this.fadeEffect.setTranslate()
				},
				setTransition: function (e) {
					"fade" === this.params.effect && this.fadeEffect.setTransition(e)
				}
			}
		}, {
			name: "effect-cube",
			params: {
				cubeEffect: {
					slideShadows: !0,
					shadow: !0,
					shadowOffset: 20,
					shadowScale: .94
				}
			},
			create: function () {
				d.extend(this, {
					cubeEffect: {
						setTranslate: be.setTranslate.bind(this),
						setTransition: be.setTransition.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					if ("cube" === this.params.effect) {
						this.classNames.push(this.params.containerModifierClass + "cube"), this.classNames.push(this.params.containerModifierClass + "3d");
						var e = {
							slidesPerView: 1,
							slidesPerColumn: 1,
							slidesPerGroup: 1,
							watchSlidesProgress: !0,
							resistanceRatio: 0,
							spaceBetween: 0,
							centeredSlides: !1,
							virtualTranslate: !0
						};
						d.extend(this.params, e), d.extend(this.originalParams, e)
					}
				},
				setTranslate: function () {
					"cube" === this.params.effect && this.cubeEffect.setTranslate()
				},
				setTransition: function (e) {
					"cube" === this.params.effect && this.cubeEffect.setTransition(e)
				}
			}
		}, {
			name: "effect-flip",
			params: {
				flipEffect: {
					slideShadows: !0,
					limitRotation: !0
				}
			},
			create: function () {
				d.extend(this, {
					flipEffect: {
						setTranslate: we.setTranslate.bind(this),
						setTransition: we.setTransition.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					if ("flip" === this.params.effect) {
						this.classNames.push(this.params.containerModifierClass + "flip"), this.classNames.push(this.params.containerModifierClass + "3d");
						var e = {
							slidesPerView: 1,
							slidesPerColumn: 1,
							slidesPerGroup: 1,
							watchSlidesProgress: !0,
							spaceBetween: 0,
							virtualTranslate: !0
						};
						d.extend(this.params, e), d.extend(this.originalParams, e)
					}
				},
				setTranslate: function () {
					"flip" === this.params.effect && this.flipEffect.setTranslate()
				},
				setTransition: function (e) {
					"flip" === this.params.effect && this.flipEffect.setTransition(e)
				}
			}
		}, {
			name: "effect-coverflow",
			params: {
				coverflowEffect: {
					rotate: 50,
					stretch: 0,
					depth: 100,
					scale: 1,
					modifier: 1,
					slideShadows: !0
				}
			},
			create: function () {
				d.extend(this, {
					coverflowEffect: {
						setTranslate: ye.setTranslate.bind(this),
						setTransition: ye.setTransition.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					"coverflow" === this.params.effect && (this.classNames.push(this.params.containerModifierClass + "coverflow"), this.classNames.push(this.params.containerModifierClass + "3d"), this.params.watchSlidesProgress = !0, this.originalParams.watchSlidesProgress = !0)
				},
				setTranslate: function () {
					"coverflow" === this.params.effect && this.coverflowEffect.setTranslate()
				},
				setTransition: function (e) {
					"coverflow" === this.params.effect && this.coverflowEffect.setTransition(e)
				}
			}
		}, {
			name: "thumbs",
			params: {
				thumbs: {
					swiper: null,
					multipleActiveThumbs: !0,
					autoScrollOffset: 0,
					slideThumbActiveClass: "swiper-slide-thumb-active",
					thumbsContainerClass: "swiper-container-thumbs"
				}
			},
			create: function () {
				d.extend(this, {
					thumbs: {
						swiper: null,
						init: xe.init.bind(this),
						update: xe.update.bind(this),
						onThumbClick: xe.onThumbClick.bind(this)
					}
				})
			},
			on: {
				beforeInit: function () {
					var e = this.params.thumbs;
					e && e.swiper && (this.thumbs.init(), this.thumbs.update(!0))
				},
				slideChange: function () {
					this.thumbs.swiper && this.thumbs.update()
				},
				update: function () {
					this.thumbs.swiper && this.thumbs.update()
				},
				resize: function () {
					this.thumbs.swiper && this.thumbs.update()
				},
				observerUpdate: function () {
					this.thumbs.swiper && this.thumbs.update()
				},
				setTransition: function (e) {
					var t = this.thumbs.swiper;
					t && t.setTransition(e)
				},
				beforeDestroy: function () {
					var e = this.thumbs.swiper;
					e && this.thumbs.swiperCreated && e && e.destroy()
				}
			}
		}];
	return void 0 === j.use && (j.use = j.Class.use, j.installModule = j.Class.installModule), j.use(Ee), j
}));
//# sourceMappingURL=swiper.min.js.map