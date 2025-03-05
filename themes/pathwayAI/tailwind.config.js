module.exports = {
	content: [
        '../templates/**/**/*.twig',
        'src/js/components/*.js'
    ],
	media: false,
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
				'dark-blue': 'rgb(var(--color-dark-blue) / <alpha-value>)'
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
