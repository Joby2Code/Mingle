use Mingle;

ALTER TABLE relationship CHANGE request_status request_status enum('Sent','Accepted','Declined');