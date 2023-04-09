-- Sequence
DROP TABLE test;
CREATE TABLE test (id integer PRIMARY KEY, nom varchar(20));
CREATE SEQUENCE seq_test START WITH 1 increment BY 1;
INSERT INTO test VALUES (seq_test.nextval, 'azerty');
SELECT * FROM test;
INSERT INTO test VALUES (seq_test.nextval, 'querty');
SELECT seq_test.currval FROM dual;
SELECT seq_test.nextval FROM dual;

-- Trigger
CREATE OR REPLACE TRIGGER maj_stock AFTER INSERT ON ligne_com FOR EACH ROW
BEGIN
    UPDATE article
    SET qtestock = qtestock - :new.qtecom
    WHERE idarticle = :new.idarticle;
END ;

CREATE OR REPLACE TRIGGER maj_stock AFTER INSERT OR DELETE OR UPDATE ON ligne_com FOR EACH ROW
BEGIN
    IF INSERTING THEN
        UPDATE article
        SET qtestock = qtestock - :new.qtecom
        WHERE idarticle = :new.idarticle;
    END IF;
    
    IF DELETING THEN
        UPDATE article
        SET qtestock=qtestock+:old.qtecom 
        WHERE idarticle=:old.idarticle;
    END IF;

    IF UPDATING THEN
        UPDATE article
        SET qtestock = qtestock + :old.qtecom - :new.qtecom
        WHERE idarticle = :old.idarticle;
    END IF;
END ;

INSERT INTO ligne_com VALUES (2,7,2,2);
INSERT INTO ligne_com VALUES (2,7,2,2);