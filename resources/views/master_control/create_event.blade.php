@extends('index')

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Events in Surabaya</title>
  @vite('resources/css/app.css')

  <style>
    .label-info {
      background-color: #5bc0de
    }

    .label-info[href]:focus,
    .label-info[href]:hover {
      background-color: #31b0d5
    }

    .label {
      display: inline;
      padding: .2em .6em .3em;
      font-size: 75%;
      font-weight: 700;
      line-height: 1;
      color: #fff;
      text-align: center;
      white-space: nowrap;
      vertical-align: baseline;
      border-radius: .25em
    }

    a.label:focus,
    a.label:hover {
      color: #fff;
      text-decoration: none;
      cursor: pointer
    }

    .label:empty {
      display: none
    }

    .btn .label {
      position: relative;
      top: -1px
    }

    .checkbox label,
    .radio label {
      min-height: 20px;
      padding-left: 20px;
      margin-bottom: 0;
      font-weight: 400;
      cursor: pointer
    }

    .btn-info {
      color: #fff;
      background-color: #5bc0de;
      border-color: #46b8da
    }

    .btn-info.disabled,
    .btn-info.disabled.active,
    .btn-info.disabled.focus,
    .btn-info.disabled:active,
    .btn-info.disabled:focus,
    .btn-info.disabled:hover,
    .btn-info[disabled],
    .btn-info[disabled].active,
    .btn-info[disabled].focus,
    .btn-info[disabled]:active,
    .btn-info[disabled]:focus,
    .btn-info[disabled]:hover,
    fieldset[disabled] .btn-info,
    fieldset[disabled] .btn-info.active,
    fieldset[disabled] .btn-info.focus,
    fieldset[disabled] .btn-info:active,
    fieldset[disabled] .btn-info:focus,
    fieldset[disabled] .btn-info:hover {
      background-color: #5bc0de;
      border-color: #46b8da
    }

    .btn-info .badge {
      color: #5bc0de;
      background-color: #fff
    }

    .label-info {
      background-color: #5bc0de;
    }

    .progress-bar-info {
      background-color: #5bc0de
    }

    .bootstrap-tagsinput {
      background-color: #fff;
      border: 1px solid #ccc;
      box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
      display: inline-block;
      padding: 4px 6px;
      color: #555;
      vertical-align: middle;
      border-radius: 4px;
      max-width: 100%;
      line-height: 22px;
      cursor: text;
    }

    .bootstrap-tagsinput input {
      border: none;
      box-shadow: none;
      outline: none;
      background-color: transparent;
      padding: 0 6px;
      margin: 0;
      width: auto;
      max-width: inherit;
    }

    .bootstrap-tagsinput.form-control input::-moz-placeholder {
      color: #777;
      opacity: 1;
    }

    .bootstrap-tagsinput.form-control input:-ms-input-placeholder {
      color: #777;
    }

    .bootstrap-tagsinput.form-control input::-webkit-input-placeholder {
      color: #777;
    }

    .bootstrap-tagsinput input:focus {
      border: none;
      box-shadow: none;
    }

    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white;
    }

    .bootstrap-tagsinput .tag [data-role="remove"] {
      margin-left: 8px;
      cursor: pointer;
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:after {
      content: "x";
      padding: 0px 2px;
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:hover {
      box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    }

    .bootstrap-tagsinput .tag [data-role="remove"]:hover:active {
      box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    }

    .icon-github {
      background: no-repeat url('../img/github-16px.png');
      width: 16px;
      height: 16px;
    }

    .bootstrap-tagsinput {
      width: 100%;
    }

    .accordion {
      margin-bottom: -3px;
    }

    .accordion-group {
      border: none;
    }

    .twitter-typeahead .tt-query,
    .twitter-typeahead .tt-hint {
      margin-bottom: 0;
    }

    .twitter-typeahead .tt-hint {
      display: none;
    }

    .tt-menu {
      position: absolute;
      top: 100%;
      left: 0;
      z-index: 1000;
      display: none;
      float: left;
      min-width: 160px;
      padding: 5px 0;
      margin: 2px 0 0;
      list-style: none;
      font-size: 14px;
      background-color: #ffffff;
      border: 1px solid #cccccc;
      border: 1px solid rgba(0, 0, 0, 0.15);
      border-radius: 4px;
      -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175);
      background-clip: padding-box;
      cursor: pointer;
    }

    .tt-suggestion {
      display: block;
      padding: 3px 20px;
      clear: both;
      font-weight: normal;
      line-height: 1.428571429;
      color: #333333;
      white-space: nowrap;
    }

    .tt-suggestion:hover,
    .tt-suggestion:focus {
      color: #ffffff;
      text-decoration: none;
      outline: 0;
      background-color: #428bca;
    }
  </style>
</head>

@section('content')
<div class="max-w-3xl mx-auto mt-5">
  <h1 class="text-2xl font-semibold mb-4">Events</h1>

  <form id="eventForm" action="{{ route('events.store') }}" method="POST">
    @csrf
    <!-- @csrf
    @method('PUT') -->

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Event Name -->
      <div>
        <label for="event-name" class="block text-sm font-medium text-gray-700">Event Name</label>
        <input type="text" id="event-name" name="event_name"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Enter event name">
      </div>

      <!-- Date -->
      <div>
        <label for="event-date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" id="event-date" name="event_date"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
      </div>

      <!-- Location -->
      <div>
        <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
        <input type="text" id="location" name="location" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          placeholder="Enter location">
      </div>

      <div>
        <label for="event-time" class="block text-sm font-medium text-gray-700">Time</label>
        <input type="time" id="event-time" name="event_time"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
      </div>

      <!-- Organizer -->
      <div>
        <label for="organizer" class="block text-sm font-medium text-gray-700">Organizer</label>
        <select id="organizer" onchange="checkOrganizer()" name="organizer"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md" required>
          <option value="dummy_organizer">Select Organizer ...</option>
          @foreach ($organizers as $organizer)
        <option value="{{ $organizer->organizer_id }}">{{ $organizer->name }}</option>
      @endforeach
        </select>
      </div>

      <!-- Booking URL -->
      <div>
        <label for="booking-url" class="block text-sm font-medium text-gray-700">Booking URL</label>
        <input type="text" id="booking-url" name="booking_url"
          class="mt-1 block w-full p-2 border border-gray-300 rounded-md" placeholder="Enter booking URL">
      </div>

      <!-- About -->
      <div class="md:col-span-2">
        <label for="about" class="block text-sm font-medium text-gray-700">About</label>
        <textarea id="about" name="about" rows="4" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          placeholder="Event description"></textarea>
      </div>

      <!-- Tags
      <div class="md:col-span-2">
        <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
        <input type="text" id="tags" name="tags" class="mt-1 block w-full p-2 border border-gray-300 rounded-md"
          data-role="tagsinput" placeholder="Enter tags">
      </div> -->

      <!-- Buttons -->
      <div class="md:col-span-2 flex justify-end space-x-3">
        <button type="submit" disabled="true" class="bg-gray-500 text-white px-4 py-2 rounded-md submit">Save</button>
        <a href="{{ route('event_table') }}" type="button"
          class="bg-gray-300 text-black px-4 py-2 rounded-md">Cancel</a>
      </div>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>

<script>
  $(document).on('click', 'span[data-role=remove]', function () {
    // Find the parent span with the class 'tag' and remove it
    $(this).closest('.tag').remove();
  })

  $('.submit').on('click', function () {
    // Grab all the span elements inside the bootstrap-tagsinput
    let tags = [];
    document.querySelectorAll('.bootstrap-tagsinput span.tag').forEach(function (tagElement) {
      tags.push(tagElement.textContent.trim());  // Get the text of each tag
    });

    // Join tags into a comma-separated string and set it as the value of the hidden input
    document.getElementById('tags').value = tags.join(',');
  });

  function checkOrganizer() {
    const organizerSelect = document.getElementById('organizer');
    console.log("Selected value:", organizerSelect.value);
    // Check if the selected value is "dummy_organizer"
    if (organizerSelect.value == "dummy_organizer") {
      // Disable the submit button
      $('.submit').prop('disabled', true);  // Correct way to disable in jQuery
      console.log("Submit button disabled");
    } else {
      // Enable the submit button
      $('.submit').prop('disabled', false);
      console.log("Submit button enabled");
    }
  }

  /*
 * bootstrap-tagsinput v0.6.1 by Tim Schlechter
 * 
 */

  !function (a) { "use strict"; function b(b, c) { this.itemsArray = [], this.$element = a(b), this.$element.hide(), this.isSelect = "SELECT" === b.tagName, this.multiple = this.isSelect && b.hasAttribute("multiple"), this.objectItems = c && c.itemValue, this.placeholderText = b.hasAttribute("placeholder") ? this.$element.attr("placeholder") : "", this.inputSize = Math.max(1, this.placeholderText.length), this.$container = a('<div class="bootstrap-tagsinput"></div>'), this.$input = a('<input type="text" placeholder="' + this.placeholderText + '"/>').appendTo(this.$container), this.$element.before(this.$container), this.build(c) } function c(a, b) { if ("function" != typeof a[b]) { var c = a[b]; a[b] = function (a) { return a[c] } } } function d(a, b) { if ("function" != typeof a[b]) { var c = a[b]; a[b] = function () { return c } } } function e(a) { return a ? i.text(a).html() : "" } function f(a) { var b = 0; if (document.selection) { a.focus(); var c = document.selection.createRange(); c.moveStart("character", -a.value.length), b = c.text.length } else (a.selectionStart || "0" == a.selectionStart) && (b = a.selectionStart); return b } function g(b, c) { var d = !1; return a.each(c, function (a, c) { if ("number" == typeof c && b.which === c) return d = !0, !1; if (b.which === c.which) { var e = !c.hasOwnProperty("altKey") || b.altKey === c.altKey, f = !c.hasOwnProperty("shiftKey") || b.shiftKey === c.shiftKey, g = !c.hasOwnProperty("ctrlKey") || b.ctrlKey === c.ctrlKey; if (e && f && g) return d = !0, !1 } }), d } var h = { tagClass: function (a) { return "label label-info" }, itemValue: function (a) { return a ? a.toString() : a }, itemText: function (a) { return this.itemValue(a) }, itemTitle: function (a) { return null }, freeInput: !0, addOnBlur: !0, maxTags: void 0, maxChars: void 0, confirmKeys: [13, 44], delimiter: ",", delimiterRegex: null, cancelConfirmKeysOnEmpty: !0, onTagExists: function (a, b) { b.hide().fadeIn() }, trimValue: !1, allowDuplicates: !1 }; b.prototype = { constructor: b, add: function (b, c, d) { var f = this; if (!(f.options.maxTags && f.itemsArray.length >= f.options.maxTags) && (b === !1 || b)) { if ("string" == typeof b && f.options.trimValue && (b = a.trim(b)), "object" == typeof b && !f.objectItems) throw "Can't add objects when itemValue option is not set"; if (!b.toString().match(/^\s*$/)) { if (f.isSelect && !f.multiple && f.itemsArray.length > 0 && f.remove(f.itemsArray[0]), "string" == typeof b && "INPUT" === this.$element[0].tagName) { var g = f.options.delimiterRegex ? f.options.delimiterRegex : f.options.delimiter, h = b.split(g); if (h.length > 1) { for (var i = 0; i < h.length; i++)this.add(h[i], !0); return void (c || f.pushVal()) } } var j = f.options.itemValue(b), k = f.options.itemText(b), l = f.options.tagClass(b), m = f.options.itemTitle(b), n = a.grep(f.itemsArray, function (a) { return f.options.itemValue(a) === j })[0]; if (!n || f.options.allowDuplicates) { if (!(f.items().toString().length + b.length + 1 > f.options.maxInputLength)) { var o = a.Event("beforeItemAdd", { item: b, cancel: !1, options: d }); if (f.$element.trigger(o), !o.cancel) { f.itemsArray.push(b); var p = a('<span class="tag ' + e(l) + (null !== m ? '" title="' + m : "") + '">' + e(k) + '<span data-role="remove"></span></span>'); if (p.data("item", b), f.findInputWrapper().before(p), p.after(" "), f.isSelect && !a('option[value="' + encodeURIComponent(j) + '"]', f.$element)[0]) { var q = a("<option selected>" + e(k) + "</option>"); q.data("item", b), q.attr("value", j), f.$element.append(q) } c || f.pushVal(), (f.options.maxTags === f.itemsArray.length || f.items().toString().length === f.options.maxInputLength) && f.$container.addClass("bootstrap-tagsinput-max"), f.$element.trigger(a.Event("itemAdded", { item: b, options: d })) } } } else if (f.options.onTagExists) { var r = a(".tag", f.$container).filter(function () { return a(this).data("item") === n }); f.options.onTagExists(b, r) } } } }, remove: function (b, c, d) { var e = this; if (e.objectItems && (b = "object" == typeof b ? a.grep(e.itemsArray, function (a) { return e.options.itemValue(a) == e.options.itemValue(b) }) : a.grep(e.itemsArray, function (a) { return e.options.itemValue(a) == b }), b = b[b.length - 1]), b) { var f = a.Event("beforeItemRemove", { item: b, cancel: !1, options: d }); if (e.$element.trigger(f), f.cancel) return; a(".tag", e.$container).filter(function () { return a(this).data("item") === b }).remove(), a("option", e.$element).filter(function () { return a(this).data("item") === b }).remove(), -1 !== a.inArray(b, e.itemsArray) && e.itemsArray.splice(a.inArray(b, e.itemsArray), 1) } c || e.pushVal(), e.options.maxTags > e.itemsArray.length && e.$container.removeClass("bootstrap-tagsinput-max"), e.$element.trigger(a.Event("itemRemoved", { item: b, options: d })) }, removeAll: function () { var b = this; for (a(".tag", b.$container).remove(), a("option", b.$element).remove(); b.itemsArray.length > 0;)b.itemsArray.pop(); b.pushVal() }, refresh: function () { var b = this; a(".tag", b.$container).each(function () { var c = a(this), d = c.data("item"), f = b.options.itemValue(d), g = b.options.itemText(d), h = b.options.tagClass(d); if (c.attr("class", null), c.addClass("tag " + e(h)), c.contents().filter(function () { return 3 == this.nodeType })[0].nodeValue = e(g), b.isSelect) { var i = a("option", b.$element).filter(function () { return a(this).data("item") === d }); i.attr("value", f) } }) }, items: function () { return this.itemsArray }, pushVal: function () { var b = this, c = a.map(b.items(), function (a) { return b.options.itemValue(a).toString() }); b.$element.val(c, !0).trigger("change") }, build: function (b) { var e = this; if (e.options = a.extend({}, h, b), e.objectItems && (e.options.freeInput = !1), c(e.options, "itemValue"), c(e.options, "itemText"), d(e.options, "tagClass"), e.options.typeahead) { var i = e.options.typeahead || {}; d(i, "source"), e.$input.typeahead(a.extend({}, i, { source: function (b, c) { function d(a) { for (var b = [], d = 0; d < a.length; d++) { var g = e.options.itemText(a[d]); f[g] = a[d], b.push(g) } c(b) } this.map = {}; var f = this.map, g = i.source(b); a.isFunction(g.success) ? g.success(d) : a.isFunction(g.then) ? g.then(d) : a.when(g).then(d) }, updater: function (a) { return e.add(this.map[a]), this.map[a] }, matcher: function (a) { return -1 !== a.toLowerCase().indexOf(this.query.trim().toLowerCase()) }, sorter: function (a) { return a.sort() }, highlighter: function (a) { var b = new RegExp("(" + this.query + ")", "gi"); return a.replace(b, "<strong>$1</strong>") } })) } if (e.options.typeaheadjs) { var j = null, k = {}, l = e.options.typeaheadjs; a.isArray(l) ? (j = l[0], k = l[1]) : k = l, e.$input.typeahead(j, k).on("typeahead:selected", a.proxy(function (a, b) { k.valueKey ? e.add(b[k.valueKey]) : e.add(b), e.$input.typeahead("val", "") }, e)) } e.$container.on("click", a.proxy(function (a) { e.$element.attr("disabled") || e.$input.removeAttr("disabled"), e.$input.focus() }, e)), e.options.addOnBlur && e.options.freeInput && e.$input.on("focusout", a.proxy(function (b) { 0 === a(".typeahead, .twitter-typeahead", e.$container).length && (e.add(e.$input.val()), e.$input.val("")) }, e)), e.$container.on("keydown", "input", a.proxy(function (b) { var c = a(b.target), d = e.findInputWrapper(); if (e.$element.attr("disabled")) return void e.$input.attr("disabled", "disabled"); switch (b.which) { case 8: if (0 === f(c[0])) { var g = d.prev(); g.length && e.remove(g.data("item")) } break; case 46: if (0 === f(c[0])) { var h = d.next(); h.length && e.remove(h.data("item")) } break; case 37: var i = d.prev(); 0 === c.val().length && i[0] && (i.before(d), c.focus()); break; case 39: var j = d.next(); 0 === c.val().length && j[0] && (j.after(d), c.focus()) }var k = c.val().length; Math.ceil(k / 5); c.attr("size", Math.max(this.inputSize, c.val().length)) }, e)), e.$container.on("keypress", "input", a.proxy(function (b) { var c = a(b.target); if (e.$element.attr("disabled")) return void e.$input.attr("disabled", "disabled"); var d = c.val(), f = e.options.maxChars && d.length >= e.options.maxChars; e.options.freeInput && (g(b, e.options.confirmKeys) || f) && (0 !== d.length && (e.add(f ? d.substr(0, e.options.maxChars) : d), c.val("")), e.options.cancelConfirmKeysOnEmpty === !1 && b.preventDefault()); var h = c.val().length; Math.ceil(h / 5); c.attr("size", Math.max(this.inputSize, c.val().length)) }, e)), e.$container.on("click", "[data-role=remove]", a.proxy(function (b) { e.$element.attr("disabled") || e.remove(a(b.target).closest(".tag").data("item")) }, e)), e.options.itemValue === h.itemValue && ("INPUT" === e.$element[0].tagName ? e.add(e.$element.val()) : a("option", e.$element).each(function () { e.add(a(this).attr("value"), !0) })) }, destroy: function () { var a = this; a.$container.off("keypress", "input"), a.$container.off("click", "[role=remove]"), a.$container.remove(), a.$element.removeData("tagsinput"), a.$element.show() }, focus: function () { this.$input.focus() }, input: function () { return this.$input }, findInputWrapper: function () { for (var b = this.$input[0], c = this.$container[0]; b && b.parentNode !== c;)b = b.parentNode; return a(b) } }, a.fn.tagsinput = function (c, d, e) { var f = []; return this.each(function () { var g = a(this).data("tagsinput"); if (g) if (c || d) { if (void 0 !== g[c]) { if (3 === g[c].length && void 0 !== e) var h = g[c](d, null, e); else var h = g[c](d); void 0 !== h && f.push(h) } } else f.push(g); else g = new b(this, c), a(this).data("tagsinput", g), f.push(g), "SELECT" === this.tagName && a("option", a(this)).attr("selected", "selected"), a(this).val(a(this).val()) }), "string" == typeof c ? f.length > 1 ? f : f[0] : f }, a.fn.tagsinput.Constructor = b; var i = a("<div />"); a(function () { a("input[data-role=tagsinput], select[multiple][data-role=tagsinput]").tagsinput() }) }(window.jQuery);
  //# sourceMappingURL=bootstrap-tagsinput.min.js.map

  /*
 * bootstrap-tagsinput v0.6.1 by Tim Schlechter
 * 
 */

  angular.module("bootstrap-tagsinput", []).directive("bootstrapTagsinput", [function () { function a(a, b) { return b ? angular.isFunction(a.$parent[b]) ? a.$parent[b] : function (a) { return a[b] } : void 0 } return { restrict: "EA", scope: { model: "=ngModel" }, template: "<select multiple></select>", replace: !1, link: function (b, c, d) { $(function () { angular.isArray(b.model) || (b.model = []); var e = $("select", c), f = d.typeaheadSource ? d.typeaheadSource.split(".") : null, g = f ? f.length > 1 ? b.$parent[f[0]][f[1]] : b.$parent[f[0]] : null; e.tagsinput(b.$parent[d.options || ""] || { typeahead: { source: angular.isFunction(g) ? g : null }, itemValue: a(b, d.itemvalue), itemText: a(b, d.itemtext), confirmKeys: a(b, d.confirmkeys) ? JSON.parse(d.confirmkeys) : [13], tagClass: angular.isFunction(b.$parent[d.tagclass]) ? b.$parent[d.tagclass] : function (a) { return d.tagclass } }); for (var h = 0; h < b.model.length; h++)e.tagsinput("add", b.model[h]); e.on("itemAdded", function (a) { -1 === b.model.indexOf(a.item) && b.model.push(a.item) }), e.on("itemRemoved", function (a) { var c = b.model.indexOf(a.item); -1 !== c && b.model.splice(c, 1) }); var i = b.model.slice(); b.$watch("model", function () { var a, c = b.model.filter(function (a) { return -1 === i.indexOf(a) }), d = i.filter(function (a) { return -1 === b.model.indexOf(a) }); for (i = b.model.slice(), a = 0; a < d.length; a++)e.tagsinput("remove", d[a]); for (e.tagsinput("refresh"), a = 0; a < c.length; a++)e.tagsinput("add", c[a]) }, !0) }) } } }]);
  //# sourceMappingURL=bootstrap-tagsinput-angular.min.js.map

  $(function () {
    $('input, select').on('change', function (event) {
      var $element = $(event.target),
        $container = $element.closest('.example');

      if (!$element.data('tagsinput'))
        return;

      var val = $element.val();
      if (val === null)
        val = "null";
      $('code', $('pre.val', $container)).html(($.isArray(val) ? JSON.stringify(val) : "\"" + val.replace('"', '\\"') + "\""));
      $('code', $('pre.items', $container)).html(JSON.stringify($element.tagsinput('items')));
    }).trigger('change');
  });

  var citynames = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
      url: 'assets/citynames.json',
      filter: function (list) {
        return $.map(list, function (cityname) {
          return { name: cityname };
        });
      }
    }
  });
  citynames.initialize();

  var cities = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: 'assets/cities.json'
  });
  cities.initialize();

  /**
   * Typeahead
   */
  var elt = $('.example_typeahead > > input');
  elt.tagsinput({
    typeaheadjs: {
      name: 'citynames',
      displayKey: 'name',
      valueKey: 'name',
      source: citynames.ttAdapter()
    }
  });

  /**
   * Objects as tags
   */
  elt = $('.example_objects_as_tags > > input');
  elt.tagsinput({
    itemValue: 'value',
    itemText: 'text',
    typeaheadjs: {
      name: 'cities',
      displayKey: 'text',
      source: cities.ttAdapter()
    }
  });

  elt.tagsinput('add', { "value": 1, "text": "Amsterdam", "continent": "Europe" });
  elt.tagsinput('add', { "value": 4, "text": "Washington", "continent": "America" });
  elt.tagsinput('add', { "value": 7, "text": "Sydney", "continent": "Australia" });
  elt.tagsinput('add', { "value": 10, "text": "Beijing", "continent": "Asia" });
  elt.tagsinput('add', { "value": 13, "text": "Cairo", "continent": "Africa" });

  /**
   * Categorizing tags
   */
  elt = $('.example_tagclass > > input');
  elt.tagsinput({
    tagClass: function (item) {
      switch (item.continent) {
        case 'Europe': return 'label label-primary';
        case 'America': return 'label label-danger label-important';
        case 'Australia': return 'label label-success';
        case 'Africa': return 'label label-default';
        case 'Asia': return 'label label-warning';
      }
    },
    itemValue: 'value',
    itemText: 'text',
    // typeaheadjs: {
    //   name: 'cities',
    //   displayKey: 'text',
    //   source: cities.ttAdapter()
    // }
    typeaheadjs: [
      {
        hint: true,
        highlight: true,
        minLength: 2
      },
      {
        name: 'cities',
        displayKey: 'text',
        source: cities.ttAdapter()
      }
    ]
  });
  elt.tagsinput('add', { "value": 1, "text": "Amsterdam", "continent": "Europe" });
  elt.tagsinput('add', { "value": 4, "text": "Washington", "continent": "America" });
  elt.tagsinput('add', { "value": 7, "text": "Sydney", "continent": "Australia" });
  elt.tagsinput('add', { "value": 10, "text": "Beijing", "continent": "Asia" });
  elt.tagsinput('add', { "value": 13, "text": "Cairo", "continent": "Africa" });

  // HACK: overrule hardcoded display inline-block of typeahead.js
  $(".twitter-typeahead").css('display', 'inline');

</script>
@endsection

@section('library-js')

@endsection