<?php
/**
 * Register the ElggModel class for the object/model subtype
 */

if (get_subtype_id('object', 'model')) {
	update_subtype('object', 'model', 'ElggModel');
} else {
	add_subtype('object', 'model', 'ElggModel');
}
