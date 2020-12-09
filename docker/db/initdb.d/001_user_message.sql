CREATE TABLE identity_user_message (
        event_id                VARCHAR(36) NOT NULL,
        event_type              VARCHAR(100) NOT NULL,
        aggregate_root_id       VARCHAR(36) NOT NULL,
        aggregate_root_version  INTEGER NOT NULL DEFAULT '1',
        time_of_recording       TIMESTAMPTZ,
        payload                 VARCHAR(5000) NOT NULL
);

CREATE INDEX aggregate_root_id_ix ON identity_user_message (aggregate_root_id);
CREATE INDEX time_of_recording_idx ON identity_user_message (time_of_recording);
