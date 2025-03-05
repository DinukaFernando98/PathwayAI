export default function forms() {
   /* Floating Labels */
    $(document).on('focus', '.form-control',
        function() {
            $(this).closest('.field-holder').find('label').addClass('active');
        }
    );
    $('#country').val('');
    $('.country-label').removeClass('active');
    $(document).on('change', '#country',
        function() {
            $('.country-label').addClass('active');
        }
    );
    $(document).on('click', '.field-holder label',
        function() {
            $(this).closest('.field-holder').find('label').addClass('active');
            $(this).closest('.field-holder').find('input').trigger('focus');
            $(this).closest('.field-holder').find('select').trigger('focus');
            $(this).closest('.field-holder').find('textarea').trigger('focus')
        }
    );
    $(document).on('blur', 'input.form-control,textarea.form-control,select.form-control',
        function() {
            if ($(this).closest('.field-holder').find('input').val() == '' || $(this).closest('.field-holder').find('textarea').val() == '' || $(this).closest('.field-holder').find('select').val() == '')
                $(this).closest('.field-holder').find('label').removeClass('active');

        }
    );

    //$('input.form-control,textarea.form-control,select.form-control').each(function() {
   $('input.form-control,textarea.form-control').each(function() {
        //if ($(this).val().length > 0) {
       if ($(this).val() != '') {
            //alert('has test');
            $(this).closest('.field-holder').find('label').addClass('active');
        }
        //else{
        //    alert('nott')
        //}
    });


    // File upload
    const uploadArea = document.getElementById('upload-area');
    const fileInput = document.getElementById('file-input');
    const fileNamesDisplay = document.getElementById('file-names');

    if (uploadArea && fileInput) {
        uploadArea.addEventListener('click', () => fileInput.click());

        uploadArea.addEventListener('dragover', (event) => {
            event.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (event) => {
            event.preventDefault();
            uploadArea.classList.remove('dragover');
            handleFiles(event.dataTransfer.files);
        });

        fileInput.addEventListener('change', () => {
            handleFiles(fileInput.files);
        });
    } else {
        //console.error('fileInput or uploadArea does not exist.');
    }

    function handleFiles(files) {
        const validExtensions = ['pdf', 'doc', 'docx'];
        const dataTransfer = new DataTransfer();
        const fileNames = [];
        let hasInvalidFile = false;

        for (const file of files) {
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (validExtensions.includes(fileExtension)) {
                dataTransfer.items.add(file);
                fileNames.push(file.name);
                console.log('File accepted:', file.name);
            } else {
                hasInvalidFile = true;
                console.error('Invalid file type:', file.name);
            }
        }

        fileInput.files = dataTransfer.files;
        updateFileNamesDisplay(fileNames, hasInvalidFile);
    }

    function updateFileNamesDisplay(fileNames, hasInvalidFile) {
        if (fileNamesDisplay) {
            fileNamesDisplay.innerHTML = '';
            if (hasInvalidFile) {
                fileNamesDisplay.textContent = 'Only PDF, DOC, and DOCX files are allowed.';
                fileNamesDisplay.style.color = 'pink';
            } else if (fileNames.length === 0) {
                fileNamesDisplay.textContent = 'No file chosen';
            } else {
                fileNamesDisplay.textContent = fileNames.join(', ');
            }
        } else {
            console.error('fileNamesDisplay does not exist.');
        }
    }
}