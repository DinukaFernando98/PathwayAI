module.exports = {
	config: {
		tailwindJS: "./tailwind.config.js",
		port: 9001,
		safelist: [
			/flickity-*/,
			'dot',
			'is-active',
			'is-draggable',
			'is-pointer-down',
			'previous',
			'next'
		],
    },
	paths: {
		root: "./",
		src: {
			base: "./src",
			main: "./src/scss/main.scss",
			css: "./src/scss",
			js: "./src/js"
		},
		dist: {
			base: "./dist",
			css: "./dist/css",
			js: "./dist/js"
		},
		build: {
			base: "./build",
			css: "./build/css",
			js: "./build/js"
		}
	},
}
