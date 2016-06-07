8<?php
/*
 * define field type
 * */

class Field_Type {

    private function __construct() {
        
    }

    public function field_Text($name, $label, $default, $place) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <input type="text"
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            if ($default) {
                echo 'value="' . $default . '"';
            }
            if ($place) {
                echo 'placeholder="' . $place . '"';
            }
            ?> 
                   />
        </div>
        <?php
    }

    public function field_Textarea($name, $label, $default, $place, $rows = 5, $cols = 20) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <textarea
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            if ($default) {
                echo 'value="' . $default . '"';
            }
            if ($place) {
                echo 'placeholder="' . $place . '"';
            }
            ?>
                rows="<?php echo $rows ?>"
                cols="<?php echo $cols ?>"
                ></textarea>
        </div>        
        <?php
    }

    public function field_Number($name, $label, $default, $place) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <input type="number"
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            if ($default) {
                echo 'value="' . $default . '"';
            }
            if ($place) {
                echo 'placeholder="' . $place . '"';
            }
            ?> 
                   />
        </div>

        <?php
    }

    public function field_Password($name, $label, $place) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <input type="password"
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            if ($place) {
                echo 'placeholder="' . $place . '"';
            }
            ?> 
                   />      
        </div>
        <?php
    }

    public function field_Email($name, $label, $default, $place) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <input type="email"
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            if ($default) {
                echo 'value="' . $default . '"';
            }
            if ($place) {
                echo 'placeholder="' . $place . '"';
            }
            ?> 
                   />
        </div>
        <?php
    }

    public function field_Select($name, $label, $select, $select_multi) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <select name="<?php echo $name ?>"
            <?php
            if ($select_multi == 'yes') {
                echo 'multiple="multiple"';
            }
            ?> 
                    >
                        <?php
                        if ($select) {
                            $option = explode(',', $select);
                            foreach ($option as $item) {
                                if (strpos($item, ':') !== FALSE) {
                                    $item = explode(':', $item);
                                    echo '<option value="' . $item[0] . '">' . $item[1] . '</option>';
                                }
                            }
                        }
                        ?>   
            </select>
        </div>
        <?php
    }

    public function field_Checkbox($name, $label, $select, $layout) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>

            <?php
            if ($select) {
                $option = explode(',', $select);
                foreach ($option as $item) {
                    if (strpos($item, ':') !== FALSE) {
                        $item = explode(':', $item);
                        echo '<input class="field-checkbox" type="checkbox" name="' . $name . '[]" value="' . $item[0] . '" />' . $item[1];
                    }
                }
            }
            ?> 

        </div>

        <?php
    }

    public function field_Radio($name, $label, $select, $layout) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>

            <?php
            if ($select) {
                $option = explode(',', $select);
                foreach ($option as $item) {
                    if (strpos($item, ':') !== FALSE) {
                        $item = explode(':', $item);
                        echo '<input class="field-radio" type="radio" name="' . $name . '" value="' . $item[0] . '" />' . $item[1];
                    }
                }
            }
            ?> 
        </div>
        <?php
    }

    public function field_Date($name, $label) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <input type="date"
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            ?> 
           />
        </div>
        <?php
    }
    public function field_Image($name, $label) {
        ?>
        <div class="field-register">
            <?php
            if ($label) {
                echo '<span class="label">' . $label . ': </span>';
            }
            ?>
            <input type="file"
            <?php
            if ($name) {
                echo 'name="' . $name . '"';
            }
            wp_get_attachment_image($name,'',true);
            ?> 
           />
        </div>
        <?php
    }
}
?>


