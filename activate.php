<?php
/**
 * Register the Elggmodel class for the object/model subtype
 */

if (get_subtype_id('object', 'model')) {
	update_subtype('object', 'model', 'Elggmodel');
} else {
	add_subtype('object', 'model', 'Elggmodel');
}
