// const path = require('path')

// const AutoImport = require('unplugin-auto-import/webpack')
// const Components = require('unplugin-vue-components/webpack')
// const { ElementPlusResolver } = require('unplugin-vue-components/resolvers')

// function resolve(dir) {
//   return path.join(
//     __dirname,
//     '/resources/js',
//     dir
//   );
// }

// module.exports = {
//   module: {
//     rules: [
//       {
//         test: /\.svg$/,
//         loader: 'svg-sprite-loader',
//         include: [resolve('icons')],
//         options: {
//           symbolId: 'icon-[name]',
//         },
//       },
//     ],
//   },
//   plugins: [
//     AutoImport({
//       resolvers: [ElementPlusResolver()],
//     }),
//     Components({
//       resolvers: [ElementPlusResolver()],
//     })
//   ],
// };
