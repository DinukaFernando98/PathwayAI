module.exports = {
	content: [
        'templates/**/*.ss',
        'src/js/components/*.js'
    ],
	media: false, // or 'media' or 'class'
	theme: {
		container: {
			center: true,
			padding: '1.5rem',
		},
		extend: {
			colors: {
				'primary': 'rgb(var(--color-primary) / <alpha-value>)',
				'secondary': 'rgb(var(--color-secondary) / <alpha-value>)',
				'tertiary': 'rgb(var(--color-tertiary) / <alpha-value>)',
			},
		},
	},
	variants: {
		extend: {

		},
	},
	plugins: [],
	corePlugins: {
		float: false,
	}
}
