<?php   
    function print_footer($root_folder) 
    {
        $error_message = isset($_GET["error_message"]) 
        ? 
        "Please submit the message without special characters or empty fields in the form." 
        : 
        "";
        $success_message = isset($_GET["success_message"]) 
        ? 
        "Your message was saved. Now I'll send an automated response to your email and contact you soon." 
        : 
        "";
        $component = '
            <div id="contact" class="section_separator_heading">
                <h2>Let\'s Have a Conversation</h2>
            </div>
            <div id="footer">
                <div id="information_container">
                    
                    <h2>You can Contact Me Through This form</h2>
                    <p id="action_message"> 
                    I\'m in the perfect place to specialize in: 
                    <br>UI & UE, 
                    <br>FullStack Development, 
                    <br>Revit API Development, 
                    <br>BIM Management, 
                    <br>or Programatic Parametric Modeling for your organization.
                    </p>
                    <p id="form_submit_message_container" class=".noError"></p>
                    <form id="contact_form" method="post" action="'.$root_folder.'00_global/controllers/contact_form.php">
                        <input name="first_name" type="text" placeholder="First Name">
                        <input name="last_name" type="text" placeholder="Last Name">
                        <input name="email" type="email" placeholder="Email">
                        <textarea name="message" placeholder="Message"></textarea>
                        <input type="submit" value="Send">
                    </form>
                </div>
                <img src="'.$root_folder.'00_global/media/image/brand/personal_photo_425x550_lighted_and_trimmed.png" alt="Eduardo Osteicoechea foto" height="550px">
                <div class="bottom_border">
                </div>
            </div>
            <script>
                let form_submit_message_container = document.getElementById("form_submit_message_container")
                const footer = document.getElementById("footer")
                const url_with_parameters = window.location.href.split("?")
                const url_with_single_parameter_message = window.location.href.split("?")[0] + "?" + window.location.href.split("?")[1]
                let url_last_parameter = window.location.href.split("?")[window.location.href.split("?").length - 1]

                if 
                ( 
                    url_with_parameters.length > 1
                    &&
                    url_last_parameter.includes("error_message")
                ) 
                {
                    footer.scrollIntoView()
                    form_submit_message_container.className = "error"
                    form_submit_message_container.innerHTML = "Please submit the message without special characters or empty fields."
                    history.pushState({}, "", window.location.href.split("?")[0] + "?" + "error_message=error");
                } 
                else if
                (
                    url_with_parameters.length > 1
                    &&
                    url_last_parameter.includes("success_message")
                )  
                {
                    footer.scrollIntoView()
                    form_submit_message_container.className = "success"
                    form_submit_message_container.innerHTML = "Your message was saved and I\'ll contact you as soon as possible."
                    history.pushState({}, "", window.location.href.split("?")[0] + "?" + "success_message=success");
                    
                }     
            </script>
        ';
        
        $_GET["error_message"] = "";
        unset($_GET["error_message"]);
        
        return $component;
    };
?>