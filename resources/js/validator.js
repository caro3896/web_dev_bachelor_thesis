// VALIDATIONS
export const validateName = (form, options = {}) => {
    let error = '';

    if (!form.name) {
        error = 'Navn må ikke være tomt';
    }

    if (options.letters && form.name && !/^[a-zA-Z\s]+$/.test(form.name)) {
        error = 'Navnet må kun indeholde bogstaver';
    }

    if (form.name && form.name.length > 50) {
        error = `Navnet må max være 50 karakterer langt`;
    }

    return error;
};

export const validateEmail = (form = {}) => {
    let error = '';

    if (!form.email) {
        error = 'Email skal udfyldes';
    }

    if (form.email && !/^\S+@\S+\.\S+$/.test(form.email)) {
        error = 'Ugyligt email';
    }

    return error;
};

export const validatePassword = (form, options = {}) => {
    let error = '';

    if (options.required && !form.password) {
        error = 'Password skal udfyldes';
    } else if (options.required && form.password.length < options.minLength) {
        error = `Password skal være mindst ${options.minLength} karakterer langt`
    }
    else if (!options.required && form.password.length > 0 && form.password.length< options.minLength){
        error = `Password skal være mindst ${options.minLength} karakterer langt`
    }

    return error;
};

export const validateCredits = (form = {}) => {
    let error = '';

    if (!form.credits && !/^\d+$/.test(form.credits)) {
        error = 'Credits skal være et tal';
    }

    return error;
};

export const validateDescription = (form = {}) => {
    let error = '';

    if (!form.description) {
        error = 'Beskrivelse må ikke være tomt';
    }

    if (form.description && form.description.length > 200) {
        error = 'Beskrivelsen må max være 200 karakterer langt';
    }

    return error;
};

export const validatePrice = (form = {}) => {
    let error = '';

    if (!form.price && !/^\d+$/.test(form.price)) {
        error = 'Pris skal være et tal';
    }

    return error;
};

export const validateImage = (form = {}) => {
    let error = '';

    if (!form.image) {
        error = 'Billede skal vælges';
        return error;
    }

    const allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
    const isImage = allowedImageTypes.includes(form.image.type);

    if (!isImage) {
        error = 'Billedet skal være af typen JPEG, PNG, eller GIF';
    }

    const maxSizeInBytes = 2 * 1024 * 1024;
    if (form.image.size > maxSizeInBytes) {
        error = `Billedet skal være mindre end 2MB`;
    }

    return error;
};