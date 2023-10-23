import toastr from 'toastr';
import 'toastr/build/toastr.min.css'
export function useToastr(){

    toastr.options.progressBar = true;
    toastr.options.closeButton = true;
    toastr.options.positionClass = 'toast-top-right';
    return toastr;
}
