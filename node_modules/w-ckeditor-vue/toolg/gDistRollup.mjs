import fs from 'fs'
import rollupFiles from 'w-package-tools/src/rollupFiles.mjs'


let fdSrc = './src'
let fdSrcCK = './distCK'
let fdTar = './dist'


async function core() {

    //rollupFiles
    await rollupFiles({
        fns: ['WCkeditorVue.vue'],
        fdSrc,
        fdTar,
        nameDistType: 'kebabCase',
        globals: {
            'ClassicEditor': 'ClassicEditor',
        },
        external: [
            'ClassicEditor',
        ],
    })

    //copyFileSync
    fs.copyFileSync(`${fdSrcCK}/ckeditor.js`, `${fdTar}/ckeditor.js`)
    fs.copyFileSync(`${fdSrcCK}/ckeditor.js.map`, `${fdTar}/ckeditor.js.map`)

}
core()
    .catch((err) => {
        console.log(err)
    })
