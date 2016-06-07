<?php
/*
 * Add attribute for each field type
 **/
class Field_Attribute{

    public function __construct() {
        
    }

    public function field_Text() {
        ?>
        <div class="field-register">
            <span class="label">Default Value:</span>
            <input type="text" name="field_default"/>
        </div>
        <div class="field-register">
            <span class="label">Placeholder Text:</span>
            <input type="text" name="field_placeholder" />
        </div>
        <?php
    }

    public function field_Textarea() {
        ?>
        <div class="field-register">
            <span class="label">Default Value:</span>
            <textarea name="field_default" rows="5" cols="30"></textarea>
        </div>
        <div class="field-register">
            <span class="label">Placeholder Text:</span>
            <input type="text" name="field_placeholder" value="" />
        </div>
        <div class="field-register">
            <span class="label">Rows:</span>
            <input type="text" name="field_rows" value="" />
        </div>
         <div class="field-register">
            <span class="label">Cols:</span>
            <input type="text" name="field_cols" value="" />
        </div>
        <?php
    }

    public function field_Number() {
        ?>
        <div class="field-register">
            <span class="label">Default Value:</span>
            <input type="text" name="field_default"/>
        </div>
        <div class="field-register">
            <span class="label">Placeholder Text:</span>
            <input type="text" name="field_placeholder" />
        </div>
        <?php
    }

    public function field_Password() {
        ?>
        <div class="field-register">
            <span class="label">Placeholder Text:</span>
            <input type="text" name="field_placeholder" />
        </div>
        <?php
    }
    public function field_Email() {
        ?>
        <div class="field-register">
            <span class="label">Placeholder Text:</span>
            <input type="text" name="field_placeholder" />
        </div>
        <?php
    }
    public function field_Select() {
        ?>
        <div class="field-register">
            <span class="label">Choices:<br>
                <span class="desc">
                    Enter each choices on a new line.
                    For more control, you may specify both a value and label like this:<br>
                    red : Red</br>
                    blue : Blue
                </span>                    
            </span>
            <textarea name="field_select" id="field_select" rows="5" cols="30"></textarea>
        </div>
        <div class="field-register">
            <span class="label">Select multiple values?:</span>
            <input type="radio" name="field_select_multiple" value="yes" />Yes
            <input type="radio" name="field_select_multiple" value="no" checked="checked" />No
        </div>
        <?php
    }
    public function field_Checkbox() {
        ?>
        <div class="field-register">
            <span class="label">Choices:<br>
                <span class="desc">
                    Enter each choices on a new line.
                    For more control, you may specify both a value and label like this:<br>
                    red : Red</br>
                    blue : Blue
                </span>                    
            </span>
            <textarea name="field_select" id="field_select" rows="5" cols="30"></textarea>
        </div>
        <div class="field-register">
            <span class="label">Layout:</span>
            <input type="radio" name="field_layout" value="vertical" />Vertical
            <input type="radio" name="field_layout" value="horizonta" checked="checked" />Horizontal
        </div>
        <?php
    }
    public function field_Radio() {
        ?>
        <div class="field-register">
            <span class="label">Choices:<br>
                <span class="desc">
                    Enter each choices on a new line.
                    For more control, you may specify both a value and label like this:<br>
                    red : Red</br>
                    blue : Blue
                </span>                    
            </span>
            <textarea name="field_select" id="field_select" rows="5" cols="30"></textarea>
        </div>
        <div class="field-register">
            <span class="label">Layout:</span>
            <input type="radio" name="field_layout" value="vertical" checked="checked"/>Vertical
            <input type="radio" name="field_layout" value="horizonta"  />Horizontal
        </div>
        <?php
    }
    public function field_Date() {
        ?>
         <div class="field-register">
            <span class="label">Date Format:</span> 
            <input type="text" name="field_format" />
        </div>
        <?php
    }
}
?>


