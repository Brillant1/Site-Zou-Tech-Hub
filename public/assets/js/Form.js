class Form{

    /* constructor(){

    } */

    static bootstrapInvalid(field, message){
        let feedback;

        if(!field.hasClass('is-invalid')){
            field.addClass('is-invalid');
            feedback = $("<div></div>").text(message).addClass('invalid-feedback');
            field.after(feedback);
        }
    }

    static removeInvalidClass(container){
        container.find('.is-invalid').removeClass('is-invalid');
        container.find(".invalid-feedback").remove();
    }

    static showErrorOnForm(errors, containerId){
        let container = document.querySelector(`${containerId}`);
        let input, message, modal;

        this.removeInvalidClass($(container));
        for (name in errors){
            if (name.indexOf(".")>=0){
                let err = name.split('.')[0]+"[]";
                input = container.querySelector(`[name='${err}']`);
            }else{
                input = container.querySelector(`[name=${name}]`);
            }
            message = errors[`${name}`][0];
            // console.log(input, message);

            if ($(container).closest('.modal').length){
                modal = $(container).closest('.modal');

                $(modal).one('hidden.bs.modal', function (e) {
                    Form.removeInvalidClass($(container));
                })
            }
            this.bootstrapInvalid($(input), message);
        }
    }
}
