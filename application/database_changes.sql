-- done
ALTER TABLE `cash_counter_challan` ADD `modify_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `add_date`;
--new 
ALTER TABLE `cash_counter_challan` ADD `zone_id` VARCHAR(20) NOT NULL AFTER `user_id`, ADD `dept_id` VARCHAR(20) NOT NULL AFTER `zone_id`;
ALTER TABLE `cash_counter` ADD `zone_id` VARCHAR(20) NOT NULL AFTER `user_id`, ADD `dept_id` VARCHAR(20) NOT NULL AFTER `zone_id`;
