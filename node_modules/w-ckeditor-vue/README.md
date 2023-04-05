# w-ckeditor-vue
A wrapper for @ckeditor/ckeditor5-vue.

![language](https://img.shields.io/badge/language-JavaScript-orange.svg) 
[![language](https://img.shields.io/badge/vue-2.x-brightgreen.svg)](https://github.com/vuejs/vue) 
[![npm version](http://img.shields.io/npm/v/w-ckeditor-vue.svg?style=flat)](https://npmjs.org/package/w-ckeditor-vue) 
[![gzip file size](http://img.badgesize.io/yuda-lyu/w-ckeditor-vue/master/dist/w-ckeditor-vue.umd.js.svg?compression=gzip)](https://github.com/yuda-lyu/w-ckeditor-vue)
[![npm download](https://img.shields.io/npm/dt/w-ckeditor-vue.svg)](https://npmjs.org/package/w-ckeditor-vue) 
[![jsdelivr download](https://img.shields.io/jsdelivr/npm/hm/w-ckeditor-vue.svg)](https://www.jsdelivr.com/package/npm/w-ckeditor-vue)

## Documentation
To view documentation or get support, visit [docs](https://yuda-lyu.github.io/w-ckeditor-vue/module-WCkeditorVue.html).

## Example
To view some examples for more understanding, visit examples:
> **default:** [ex-default.html](https://yuda-lyu.github.io/w-ckeditor-vue/examples/ex-default.html) [[source code](https://github.com/yuda-lyu/w-ckeditor-vue/blob/master/docs/examples/ex-default.html)]

## Installation
### Using npm(ES6 module):
> **Note:** w-ckeditor-vue is mainly dependent on `@ckeditor/ckeditor5-build-classic`, `@ckeditor/ckeditor5-vue` and `vue`.
```alias
npm i w-ckeditor-vue
```
By import:
```alias
<w-ckeditor-vue 
    v-model="..."
></w-ckeditor-vue>

import WCkeditorVue from 'w-ckeditor-vue'

Vue.component('w-ckeditor-vue', WCkeditorVue)
```

### In a browser(UMD module):
> **Note:** umd file includes with `@ckeditor/ckeditor5-vue`, by using tree-shaking for dead-code elimination

[Necessary] Add script for ckeditor.
```alias
<script src="https://cdn.jsdelivr.net/npm/@ckeditor/ckeditor5-build-classic@21.0.0/build/ckeditor.js"></script>
```
[Necessary] Add script for vue.
```alias
<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.min.js"></script>
```
[Necessary] Add script for w-ckeditor-vue.
```alias
<script src="https://cdn.jsdelivr.net/npm/w-ckeditor-vue@2.0.4/dist/w-ckeditor-vue.umd.js"></script>
```
Directly use:
```alias
<w-ckeditor-vue 
    v-model="..."
></w-ckeditor-vue>

Vue.component('w-ckeditor-vue', window['w-ckeditor-vue'])

new Vue({
    el: '#app',
    data: {
        content: 'abc中文123'
    }
})
```